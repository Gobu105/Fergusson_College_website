from flask import Flask, request, jsonify
from ml_model import chat, add_new_data, retrain

app = Flask(__name__)

@app.route("/")
def home():
    return jsonify({"status": "running", "message": "ML Chatbot API active."})

@app.route("/chat", methods=["POST"])
def chat_route():
    data = request.get_json()
    user_message = data.get("message", "")
    response = chat(user_message)
    return jsonify(response)

@app.route("/teach", methods=["POST"])
def teach_route():
    data = request.get_json()
    question = data.get("question")
    answer = data.get("answer")
    response = add_new_data(question, answer)
    return jsonify(response)

@app.route("/retrain", methods=["POST"])
def retrain_route():
    response = retrain()
    return jsonify(response)

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=5000)
