from flask import Flask, render_template
from flask_socketio import SocketIO, emit

app = Flash(__name__)
socketio = SocketIO(app)