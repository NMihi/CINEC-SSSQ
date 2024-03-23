# CINEC-SSSQ

<h1>Use the below queries to create the database and tables before you run the system.</h1>

CREATE DATABASE CINEC_SSSQ;

USE CINEC_SSSQ;

CREATE TABLE IF NOT EXISTS users (
user_id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
user_type ENUM('Client', 'Admin', 'Super Admin') NOT NULL,
email VARCHAR(100) NOT NULL UNIQUE,
fac_dep VARCHAR(50)DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS request_form (
request_id INT AUTO_INCREMENT PRIMARY KEY,
fac_dep VARCHAR(50) NOT NULL,
course VARCHAR(100) NOT NULL,
batch_no VARCHAR(50) NOT NULL,
semester VARCHAR(50) NOT NULL,
no_of_students INT NOT NULL,
proposed_date DATE NOT NULL,
user_id INT,
link VARCHAR(100) NOT NULL,
FOREIGN KEY (user_id) REFERENCES users(user_id)
);

CREATE TABLE IF NOT EXISTS lecturer_names (
id INT AUTO_INCREMENT PRIMARY KEY,
request_id INT NOT NULL,
lecturer_name VARCHAR(100) NOT NULL,
FOREIGN KEY (request_id) REFERENCES request_form(request_id)
);

CREATE TABLE IF NOT EXISTS fac_dep (
fac_id INT AUTO_INCREMENT PRIMARY KEY,
fac_or_dep VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS course (
course_code VARCHAR(100) PRIMARY KEY,
course_name VARCHAR(100) NOT NULL,
fac_id INT NOT NULL,
FOREIGN KEY (fac_id) REFERENCES fac_dep(fac_id)
);

CREATE TABLE IF NOT EXISTS lecturer (
lec_id INT AUTO_INCREMENT PRIMARY KEY,
lec_name VARCHAR(100) NOT NULL,
fac_id INT NOT NULL,
FOREIGN KEY (fac_id) REFERENCES fac_dep(fac_id)
);

CREATE TABLE IF NOT EXISTS form_submit (
sub_id INT AUTO_INCREMENT PRIMARY KEY,
request_id INT NOT NULL,
course_name VARCHAR(100) NOT NULL,
course_code VARCHAR(50) NOT NULL,
batch VARCHAR(100) NOT NULL,
submitted_date DATE NOT NULL,
TTL VARCHAR(50) NOT NULL,
classrooms VARCHAR(50) NOT NULL,
other_facilities VARCHAR(50) NOT NULL,
LEI VARCHAR(50) NOT NULL,
support_services VARCHAR(50) NOT NULL,
support_services_comment VARCHAR(100) NOT NULL,
AOM VARCHAR(100) NOT NULL,
FOREIGN KEY (request_id) REFERENCES request_form(request_id)
);

CREATE TABLE IF NOT EXISTS submitted_lecturers (
sublec_id INT AUTO_INCREMENT PRIMARY KEY,
sub_id INT NOT NULL,
lec_name VARCHAR(100) NOT NULL,
teaching VARCHAR(100) NOT NULL,
notes VARCHAR(100) NOT NULL,
FOREIGN KEY (sub_id) REFERENCES form_submit(sub_id)
);

CREATE TABLE IF NOT EXISTS batches (
batch_id INT AUTO_INCREMENT PRIMARY KEY,
batch_name VARCHAR(100) NOT NULL,
course_code VARCHAR(100) NOT NULL,
FOREIGN KEY (course_code) REFERENCES course(course_code)
);

INSERT INTO fac_dep (fac_id,fac_or_dep) VALUES
('1','Civil Engineering'),
('2','Mechanical & Automotive Engineering'),
('3','Electrical & Electronic Engineering'),
('4','Biomedical Science'),
('5','Pharmacy and Pharmaceutical Sciences'),
('6','Cosmetic Science'),
('7','Health and Medical Sciences'),
('8','Logistics and Transport'),
('9','Management and Business Studies'),
('10','Education'),
('11','English'),
('12','English Language Teaching Unit'),
('13','Navigation'),
('14','Safety & Survival Training'),
('15','Marine Electronics & Radio Communications'),
('16','Maritime Simulation'),
('17','Marine Engineering'),
('18','Marine Electrical'),
('19','Computer Science'),
('20','Information Technology');
