from flask import Flask, request, jsonify
from ml_model import chat, add_new_data, retrain

app = Flask(__name__)

@app.route('/')
def home():
    return jsonify({"message": "Fergusson ML API is running!"})

@app.route('/chat', methods=['POST'])
def chat_api():
    data = request.get_json()
    user_input = data.get('message', '')  # must match PHP key
    result = chat(user_input)
    return jsonify(result)

@app.route('/teach', methods=['POST'])
def teach_api():
    data = request.get_json()
    q = data.get('question', '')
    a = data.get('answer', '')
    result = add_new_data(q, a)
    return jsonify(result)

@app.route('/retrain', methods=['POST'])
def retrain_api():
    result = retrain()
    return jsonify(result)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=10000)
