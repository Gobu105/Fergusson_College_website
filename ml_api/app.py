from flask import Flask, request, jsonify
import subprocess
import json

app = Flask(__name__)

@app.route("/", methods=["GET"])
def home():
    return "✅ Fergusson ML API is running!"

@app.route("/chat", methods=["POST"])
def chat():
    try:
        data = request.get_json()
        message = data.get("message", "")
        result = subprocess.check_output(["python3", "ml_model.py", message], text=True)
        return jsonify(json.loads(result))
    except Exception as e:
        return jsonify({"response": f"Error: {str(e)}"})

if __name__ == "__main__":
    app.run(host="0.0.0.0", port=10000)

