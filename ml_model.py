import sys
import json
import re
import string
import csv
import joblib
import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import cosine_similarity
from rapidfuzz import fuzz

# === Configuration ===
DATA_FILE = "faq_data.csv"
MODEL_FILE = "model_data.pkl"

CONFIDENCE_THRESHOLD = 0.45
TFIDF_WEIGHT = 0.7
FUZZY_WEIGHT = 0.3
TOP_K = 3

# === Globals for caching ===
_df = None
_vectorizer = None
_tfidf_matrix = None

# === Text Preprocessing ===
def preprocess(text):
    if not isinstance(text, str):
        return ""
    text = text.lower().strip()
    text = text.translate(str.maketrans("", "", string.punctuation))
    text = re.sub(r"\s+", " ", text)
    return text

# === Data Loading ===
def load_data():
    try:
        df = pd.read_csv(DATA_FILE)
        if "question" not in df.columns or "answer" not in df.columns:
            raise ValueError("CSV must contain 'question' and 'answer' columns.")
        df.dropna(subset=["question", "answer"], inplace=True)
        df["question_proc"] = df["question"].astype(str).map(preprocess)
        return df.reset_index(drop=True)
    except Exception as e:
        print("Error loading dataset:", e)
        return pd.DataFrame(columns=["question", "answer", "question_proc"])

# === Model Build ===
def compute_tfidf_and_matrix(df):
    vectorizer = TfidfVectorizer(ngram_range=(1, 2), stop_words="english", min_df=1)
    tfidf_matrix = vectorizer.fit_transform(df["question_proc"])
    return vectorizer, tfidf_matrix

def save_model(vectorizer, matrix):
    joblib.dump((vectorizer, matrix), MODEL_FILE)

def load_model():
    return joblib.load(MODEL_FILE)

# === Initialize or reload model ===
def init_model():
    global _df, _vectorizer, _tfidf_matrix
    _df = load_data()
    if _df.empty:
        _vectorizer, _tfidf_matrix = None, None
        return False
    _vectorizer, _tfidf_matrix = compute_tfidf_and_matrix(_df)
    save_model(_vectorizer, _tfidf_matrix)
    return True

# === Combined Scoring ===
def combined_scores(user_input, df, vectorizer, tfidf_matrix):
    user_proc = preprocess(user_input)
    if user_proc == "":
        return []

    # TF-IDF cosine similarity
    user_vec = vectorizer.transform([user_proc])
    cosines = cosine_similarity(user_vec, tfidf_matrix).flatten()

    # Fuzzy token matching
    fuzzy_raw = [fuzz.partial_token_sort_ratio(user_proc, q) for q in df["question_proc"]]
    fuzzy_norm = [s / 100.0 for s in fuzzy_raw]

    combined = [
        TFIDF_WEIGHT * c + FUZZY_WEIGHT * f for c, f in zip(cosines, fuzzy_norm)
    ]

    idx_scores = sorted(enumerate(combined), key=lambda x: x[1], reverse=True)
    results = []
    for idx, score in idx_scores[:TOP_K]:
        results.append({
            "index": idx,
            "question": df.at[idx, "question"],
            "answer": df.at[idx, "answer"],
            "tfidf_score": float(cosines[idx]),
            "fuzzy_score": float(fuzzy_norm[idx]),
            "combined_score": float(score)
        })
    return results

# === Chat Interface ===
def chat(user_input):
    global _df, _vectorizer, _tfidf_matrix

    if _df is None or _df.empty or _vectorizer is None:
        success = init_model()
        if not success:
            return {"response": "Dataset empty or invalid."}

    candidates = combined_scores(user_input, _df, _vectorizer, _tfidf_matrix)
    if not candidates:
        return {"response": "I couldn't process that input."}

    best = candidates[0]
    if best["combined_score"] < CONFIDENCE_THRESHOLD:
        return {
            "response": "Sorry, I’m not confident. Could you rephrase?",
            "debug": {"suggestions": candidates}
        }
    else:
        return {"response": best["answer"], "score": best["combined_score"], "candidates": candidates}

# === Live Training / Adding Data ===
def add_new_data(question, answer):
    question = question.strip()
    answer = answer.strip()
    if not question or not answer:
        return {"response": "Both question and answer must be provided."}

    with open(DATA_FILE, "a", newline='', encoding="utf-8") as f:
        writer = csv.writer(f)
        writer.writerow([question, answer])

    init_model()  # Rebuild the model immediately
    return {"response": f"Learned new Q&A: '{question}'"}

# === Retrain ===
def retrain():
    success = init_model()
    if not success:
        return {"response": "No data to train."}
    return {"response": f"Model retrained successfully with {_df.shape[0]} entries."}

# === CLI Entry ===
if __name__ == "__main__":
    if len(sys.argv) > 1:
        cmd = sys.argv[1].lower()

        if cmd == "retrain":
            print(json.dumps(retrain(), indent=2))

        elif cmd == "add" and len(sys.argv) > 3:
            q = sys.argv[2]
            a = " ".join(sys.argv[3:])
            print(json.dumps(add_new_data(q, a), indent=2))

        else:
            user_input = " ".join(sys.argv[1:])
            print(json.dumps(chat(user_input), indent=2))

    else:
        print(json.dumps({"response": "No input received."}, indent=2))
