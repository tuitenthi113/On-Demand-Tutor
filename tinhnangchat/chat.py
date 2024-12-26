from flask import Flask, render_template  
from flask_socketio import SocketIO, send, emit  

app = Flask(__name__)  
app.config['SECRET_KEY'] = 'your_secret_key'  
socketio = SocketIO(app)  

@app.route('/')  
def index():  
    return render_template('index.html')  

@socketio.on('message')  
def handle_message(msg):  
    print('Received message: ' + msg)  
    send(msg, broadcast=True)  # Gửi tin nhắn cho tất cả người dùng  

if __name__ == '__main__':  
    socketio.run(app)