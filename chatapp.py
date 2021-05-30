from flask import Flask, render_template
from flask_socketio import SocketIO, emit 

#notes
#.emit sends data according to its events
#.debug=True->server automatically restarts when any changes in code

app = Flask(__name__)
app.config['SECRET_KEY']= 'Numen_Shivam'
socketio = SocketIO(app)

socketio.init_app(app, cors_allowed_origins="*")

@app.route('/')
def index():
    return render_template('./ChatAppPage.html')

@socketio.on('my event')
def handle_my_custom_event( json ):
    print('recieved something' +str(json))
    socketio.emit('my response',json)

    

if __name__ == '__main__':
    socketio.run(app,debug=True)
