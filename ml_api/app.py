from flask import Flask, request, jsonify
from ml_model import chat, retrain, add_new_data

app = Flask(__name__)

@app.route('/')
def home():
    return jsonify({"message": "✅ ML API is running!"})

@app.route('/chat', methods=['POST'])
def chat_endpoint():
    data = request.get_json()
    user_input = data.get("question", "")
    result = chat(user_input)
    return jsonify(result)

@app.route('/retrain', methods=['POST'])
def retrain_endpoint():
    return jsonify(retrain())

@app.route('/add', methods=['POST'])
def add_endpoint():
    data = request.get_json()
    q = data.get("question", "")
    a = data.get("answer", "")
    return jsonify(add_new_data(q, a))

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=5000)
