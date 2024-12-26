from flask import Flask, render_template, request
from flask_socketio import SocketIO, send, emit
from datetime import datetime

# Initialize Flask app and SocketIO
app = Flask(__name__)
app.config['SECRET_KEY'] = 'your_secret_key'
socketio = SocketIO(app, cors_allowed_origins="*")  # Allow CORS for development

# Store connected users (in production, use a proper database)
connected_users = set()

@app.route('/')
def index():
    return render_template('index.html')

@socketio.on('connect')
def handle_connect():
    connected_users.add(request.sid)
    emit('message', f'A user has joined the chat. Online users: {len(connected_users)}', broadcast=True)
