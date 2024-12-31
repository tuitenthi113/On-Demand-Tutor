mysql+pymysql://root:123456789@127.0.0.1/tgs

from sqlalchemy import Column, Integer, String, Boolean, DateTime, Float, Enum, ForeignKey, Text, create_engine
from sqlalchemy.ext.declarative import declarative_base
from sqlalchemy.orm import relationship, sessionmaker
from datetime import datetime

Base = declarative_base()

class User(Base):
    __tablename__ = 'users'
    user_id = Column(Integer, primary_key=True)
    username = Column(String(20), nullable=False)
    email = Column(String(30), unique=True, nullable=False)
    password = Column(String(20), nullable=False)
    role = Column(Enum('student', 'tutor', 'admin'), nullable=False)

class Tutor(Base):
    __tablename__ = 'tutors'
    tutor_id = Column(Integer, primary_key=True)
    subject = Column(String(20), nullable=False)
    experience = Column(Integer, nullable=False)
    hourly_rate = Column(Float, nullable=False)

class Student(Base):
    __tablename__ = 'students'
    student_id = Column(Integer, primary_key=True)
    grade_level = Column(String(20), nullable=False)

class Service(Base):
    __tablename__ = 'services'
    service_id = Column(Integer, primary_key=True)
    tutor_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    subject = Column(String(20), nullable=False)
    description = Column(Text, nullable=True)

class Booking(Base):
    __tablename__ = 'bookings'
    booking_id = Column(Integer, primary_key=True)
    student_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    tutor_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    service_id = Column(Integer, ForeignKey('services.service_id'), nullable=False)
    start_time = Column(DateTime, nullable=False)
    end_time = Column(DateTime, nullable=False)

class Rating(Base):
    __tablename__ = 'ratings'
    rating_id = Column(Integer, primary_key=True)
    student_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    tutor_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    rating = Column(Integer, nullable=False)
    comment = Column(Text, nullable=True)

class Feedback(Base):
    __tablename__ = 'feedbacks'
    feedback_id = Column(Integer, primary_key=True)
    user_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    content = Column(Text, nullable=False)
    created_at = Column(DateTime, default=datetime.utcnow)

class Complaint(Base):
    __tablename__ = 'complaints'
    complaint_id = Column(Integer, primary_key=True)
    user_id = Column(Integer, ForeignKey('users.user_id'), nullable=False)
    subject = Column(String(20), nullable=False)
    content = Column(Text, nullable=False)
    status = Column(Enum('pending', 'resolved'), default='pending', nullable=False)

# Set up the database connection
engine = create_engine('mysql+pymysql://root:password@localhost/tgs', echo=True)
Base.metadata.create_all(engine)

# Create a session
Session = sessionmaker(bind=engine)
session = Session()