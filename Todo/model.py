from sqlalchemy.orm import backref
from Todo import db
from sqlalchemy import Column, Integer, String
from datetime import datetime
from flask_login import UserMixin
from flask_sqlalchemy import SQLAlchemy
from flask_security import Security, SQLAlchemyUserDatastore, UserMixin, RoleMixin, login_required
from sqlalchemy.ext.declarative import declarative_base
Base = declarative_base()
class Task(Base):
    __tablename__ = 'test'
    id = Column(db.Integer, primary_key=True)
    content = Column(db.String(200), nullable=False)
    date_created = Column(db.DateTime, default=datetime.utcnow)
    def __repr__(self):
        return '<Task %r>' % self.id

