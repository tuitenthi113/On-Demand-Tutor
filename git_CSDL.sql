create database tgs;
use tgs;

create table Users
(
user_id int primary key,
username varchar(20),
email varchar(30),
password varchar(20),
role ENUM ('student', 'tutor', 'admin')
);

insert into Users
values
(1, 'john_doe', 'john@example.com', 'hashed_password_1', 'student'),
(2, 'jane_tutor', 'jane@example.com', 'hashed_password_2', 'tutor'),
(3, 'admin_user', 'admin@example.com', 'hashed_password_3', 'admin'),
(4, 'mike_smith', 'mike@example.com', 'hashed_password_4', 'student'),
(5, 'sarah_lee', 'sarah@example.com', 'hashed_password_5', 'tutor'),
(6, 'lucy_admin', 'lucy@example.com', 'hashed_password_6', 'admin'),
(7, 'emma_watson', 'emma@example.com', 'hashed_password_7', 'student'),
(8, 'david_clark', 'david@example.com', 'hashed_password_8', 'tutor'),
(9, 'james_bond', 'james@example.com', 'hashed_password_9', 'student'),
(10, 'mary_ann', 'mary@example.com', 'hashed_password_10', 'tutor'),
(11, 'peter_pan', 'peter@example.com', 'hashed_password_11', 'student'),
(12, 'tony_stark', 'tony@example.com', 'hashed_password_12', 'tutor'),
(13, 'steve_jobs', 'steve@example.com', 'hashed_password_13', 'tutor'),
(14, 'natasha_romanoff', 'natasha@example.com', 'hashed_password_14', 'student');

select * from Users

Create table Tutors
(
tutor_id int primary key,
subject varchar(20),
experience int,
hourly_rate DECIMAL(10, 2)
);

insert into Tutors
values
(2, 'Mathematics', 5, 25.00),
(5, 'English', 3, 20.00),
(8, 'Physics', 7, 30.00),
(10, 'History', 4, 18.00),
(12, 'Computer Science', 10, 40.00),
(13, 'Graphic Design', 6, 35.00);

select* from Tutors

create table Students
(
student_id int primary key,
grade_level varchar(20)
);

insert into Students
values
(1, 'Grade 10'),
(4, 'Grade 11'),
(7, 'Grade 12'),
(9, 'Grade 9'),
(11, 'Grade 8'),
(14, 'Grade 12');

select* from Students

create table Services
(
service_id int primary key,
tutor_id int,
subject varchar(20),
description text
);

insert into Services
values
(1, 2, 'Mathematics', 'Learn algebra, geometry, and calculus with Jane'),
(2, 5, 'English', 'Improve your grammar and essay writing skills'),
(3, 8, 'Physics', 'Master the principles of mechanics and thermodynamics'),
(4, 10, 'History', 'Explore world history and key historical events'),
(5, 12, 'Computer Science', 'Learn Python, algorithms, and data structures'),
(6, 13, 'Graphic Design', 'Learn Adobe Photoshop and Illustrator for design');

select* from Services

create table Bookings
(
booking_id int primary key,
student_id int,
tutor_id int,
service_id int,
start_time DATETIME,
end_time DATETIME 
);

insert into Bookings
values
(1, 1, 2, 1, '2024-12-20 10:00:00', '2024-12-20 11:00:00'),
(2, 4, 5, 2, '2024-12-21 09:00:00', '2024-12-21 10:00:00'),
(3, 7, 8, 3, '2024-12-22 15:00:00', '2024-12-22 16:00:00'),
(4, 9, 10, 4, '2024-12-23 14:00:00', '2024-12-23 15:00:00'),
(5, 11, 12, 5, '2024-12-24 08:00:00', '2024-12-24 09:30:00'),
(6, 14, 13, 6, '2024-12-25 16:00:00', '2024-12-25 17:30:00');

select* from Bookings

create table  Ratings
(
rating_id int primary key,
student_id int,
tutor_id int,
rating int,
comment text
);

insert into Ratings 
values
(1, 1, 2, 5, 'Jane was an excellent tutor for algebra!'),
(2, 4, 5, 4, 'Sarah helped me improve my essay writing significantly.'),
(3, 7, 8, 3, 'Physics lessons were okay but could be more engaging.'),
(4, 9, 10, 5, 'Mary made history fun and easy to understand!'),
(5, 11, 12, 4, 'Tony provided great insights into algorithms.'),
(6, 14, 13, 5, 'Steve is an amazing graphic design mentor.');

select* from Ratings

create table Feedbacks
(
feedback_id int primary key,
user_id int,
content text,
created_at datetime
);

insert into Feedbacks
values
(1, 1, 'Great platform! Very user-friendly.', '2024-12-18 09:00:00'),
(2, 4, 'Would love to see more tutors in Chemistry.', '2024-12-19 11:30:00'),
(3, 7, 'The booking process was seamless!', '2024-12-20 08:45:00'),
(4, 9, 'Please add a feature to reschedule sessions.', '2024-12-21 14:20:00'),
(5, 11, 'I had a technical issue during the video call.', '2024-12-22 18:00:00'),
(6, 14, 'Thanks for the excellent support team!', '2024-12-23 10:15:00');

select* from Feedbacks

create table Complaints
(
complaint_id int primary key,
user_id int,
subject varchar(20),
content text,
status enum ('pending', 'resolved')
);

insert into Complaints
values 
(1, 1, 'Payment Issue', 'I was charged incorrectly for a session.', 'pending'),
(2, 4, 'Technical Issue', 'The chat feature keeps disconnecting during sessions.', 'resolved'),
(3, 2, 'Profile Verification', 'My tutor profile is not being approved.', 'pending'),
(4, 6, 'Delayed Payment', 'Payments to my account are delayed.', 'resolved'),
(5, 7, 'Service Quality', 'The tutor did not provide the promised material.', 'pending');

select* from Complaints
