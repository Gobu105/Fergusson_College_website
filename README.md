# 🏫 Fergusson College – Query Chatbot Website

![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)
![Language: PHP](https://img.shields.io/badge/Backend-PHP-blue)
![Language: Python](https://img.shields.io/badge/AI_Model-Python-yellow)
![Framework: Flask](https://img.shields.io/badge/Framework-Flask-lightgrey)

**Author:** Jatin Joshi  
**Institution:** Fergusson College, Pune  
**Course:** MSc.CA – First Year  

---

## 🌐 Live Demo

- 🖥️ **Website (Frontend – PHP + JS):** [https://fergusson-college-website-tjpm.onrender.com](https://fergusson-college-website-e7ab6.wasmer.app/index.php)  
- 🧠 **Chatbot API (Python – Flask):** [https://fergusson-ml-api.onrender.com](https://fergusson-college-website-tjpm.onrender.com/)

---

## 🤖 Project Overview

This project simplifies the **student admission and inquiry process** using an interactive chatbot built with **PHP (frontend)** and **Python (backend)**.  
It provides instant answers to common questions about Fergusson College — admissions, courses, fees, events, and more — through a clean, responsive website.

---

## 🚀 Key Features

- 💬 **AI-Powered Chatbot** – Answers FAQs about Fergusson College: admissions, academics, and campus life.  
- 🧠 **Hybrid Architecture** – PHP website communicating with a Python ML backend via REST API.  
- 🏛️ **About Fergusson College** – Historical background, legacy, and founders.  
- 👨‍🏫 **Faculty Section** – Interactive flip-card layout of faculty from various departments.  
- 📚 **Courses Page** – Course-wise details across different degree programs (Arts, Science, Commerce, etc.).  
- 🧮 **Infrastructure & Labs** – Detailed overview of campus facilities, research centers, and laboratories.  
- 📢 **Dynamic Events** – Highlights college events, cultural programs, and academic notices.  
- 📱 **Responsive Design** – Fully optimized for desktop, tablet, and mobile screens.  
- 🔐 **Teach Mode** – Dynamically add new Q&A pairs using `teach:` command directly from chat.  

---

## 🧩 System Architecture

```plaintext
User ↔ Website (PHP + JS)
         ↓
     chat.php (bridge)
         ↓
     Flask API (Render)
         ↓
   Machine Learning Model
         ↓
      FAQ Dataset (CSV)
```

| Component       | Technology              | Hosted On  | Purpose                         |
| --------------- | ----------------------- | ---------- | ------------------------------- |
| **Website**     | PHP, HTML, CSS, JS      | **Wasmer** | Handles the front-end rendering, HTML, CSS, and JavaScript communication. Also processes forms and sends data to the chatbot API.|
| **Chatbot API** | Flask (Python)          | **Render** | Runs the chatbot logic — receives user queries from PHP, processes them using ML/NLP, and sends back intelligent responses.|
| **Data**        | CSV (`faq_data.csv`)    | **Render** | Stores Q&A pairs                |
| **Model**       | TF-IDF + Fuzzy Matching | **Render** | Powers the chatbot’s natural language understanding and similarity matching model (TF-IDF + Fuzzy Matching).|

---

## 🛠️ Tech Stack

| Layer               | Technologies                            |
| ------------------- | --------------------------------------- |
| **Frontend**        | HTML5, CSS3, JavaScript                 |
| **Backend (Web)**   | PHP 8                                   |
| **Backend (AI)**    | Python 3.10+, Flask                     |
| **ML Libraries**    | scikit-learn, pandas, rapidfuzz, joblib |
| **Data Storage**    | CSV                                     |
| **Deployment**      | Wasmer (Frontend), Render (Backend)     |
| **Version Control** | Git & GitHub                            |


| Component       | Technology              | Hosted On  | Purpose                         |
| --------------- | ----------------------- | ---------- | ------------------------------- |
| **Website**     | PHP, HTML, CSS, JS      | **Wasmer** | User interface                  |
| **Chatbot API** | Flask (Python)          | **Render** | Handles `/chat` and `/teach`    |
| **Data**        | CSV (`faq_data.csv`)    | **Render** | Stores Q&A pairs                |
| **Model**       | TF-IDF + Fuzzy Matching | **Render** | Generates intelligent responses |
---

## ⚙️ Setup Instructions (Local Development)

- Clone Repository
  - git clone https://github.com/yourusername/fergusson-chatbot-website.git
- Setup PHP Frontend
  - Move the project into your XAMPP/Apache htdocs folder:
    - C:\xampp\htdocs\fergusson-chatbot-website
  - Then start Apache from XAMPP and visit:
    - http://localhost/fergusson-chatbot-website
- Setup Python Backend (Optional Local Run)
  - Navigate to /ml_api folder:
    - cd ml_api
    - pip install -r requirements.txt
    - python app.py
  - Your Flask API will run locally on:
    - http://127.0.0.1:5000

---

##🧠 How the Chatbot Works

1. User types a message in the chat window.

2. The PHP file chat.php sends it to the Flask API endpoint /chat.

3. The backend compares the input to existing questions using:
     - TF-IDF Vector Similarity
     - RapidFuzz String Matching
4. It selects the most relevant answer and returns it as a JSON response.
5. The JS script displays the chatbot’s message dynamically.

---

## 🌟 Future Improvements

- 🧩 Admin Dashboard – Manage FAQs, retrain model directly from web.
- 🧠 Semantic Search (Sentence-BERT) – Replace TF-IDF for better meaning-based responses.
- 💬 Typing Indicator – “Bot is replying…” animation in chat.
- 🔒 API Security – Protect backend with secret key.
- 🧑‍💻 Conversation History – Store and view previous chat logs.
- ⚡ Auto-Retrain – Rebuild model when new data is added.

---

## 🏆 Project Purpose
Developed as part of **MSc Computer Applications (MSc.CA)** at **Fergusson College, Pune**,
this project demonstrates practical integration of **Machine Learning With web Technologies**,
bridging **PHP frontend and Python AI backend** for intelligent user interaction.

## 📄 License
***MIT License***
Copyright (c) 2025 **Jatin Joshi**
