import Todo
from Todo import app
from Todo import db
from Todo.model import Task
from flask import render_template,redirect,url_for,flash
from flask import request
from sqlalchemy import create_engine
import sqlalchemy
from sqlalchemy.orm import sessionmaker
engine = create_engine('sqlite:///test.db', echo = True)
Session = sessionmaker(bind = engine)
session = Session()

@app.route('/', methods=['POST', 'GET'])
def index():
    if request.method == 'POST':
        task_content = request.form['content']
        new_task = Task(content=task_content)

        try:
            session.add(new_task)
            session.commit()
            return redirect('/')
        except:
            session.rollback()
            return 'There was an issue adding your task'

    else:
        tasks = session.query(Task).order_by(Task.date_created).all()
        return render_template('index.html', tasks=tasks)


@app.route('/delete/<int:id>')
def delete(id):
    task_to_delete = session.query(Task).get(id)
    try:
        session.delete(task_to_delete)
        session.commit()
        return redirect('/')
    except:
        return 'There was a problem deleting that task'

@app.route('/update/<int:id>', methods=['GET', 'POST'])
def update(id):
    task = session.query(Task).get(id)

    if request.method == 'POST':
        task.content = request.form['content']

        try:
            session.commit()
            return redirect('/')
        except:
            session.rollback()
            return 'There was an issue updating your task'

    else:
        session.rollback()
        return render_template('update.html', task=task)


if __name__ == "__main__":
    app.run(debug=True)
