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
faculty VARCHAR(50)DEFAULT NULL,
department VARCHAR(50) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS request_form (
request_id INT AUTO_INCREMENT PRIMARY KEY,
faculty VARCHAR(50) NOT NULL,
department VARCHAR(50) NOT NULL,
program_name VARCHAR(100) NOT NULL,
program_code VARCHAR(50) NOT NULL,
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

CREATE TABLE IF NOT EXISTS faculty (
fac_id INT AUTO_INCREMENT PRIMARY KEY,
faculty VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS department (
dep_id INT AUTO_INCREMENT PRIMARY KEY,
fac_id INT NOT NULL,
department VARCHAR(100) NOT NULL,
FOREIGN KEY (fac_id) REFERENCES faculty(fac_id)
);

CREATE TABLE IF NOT EXISTS course (
course_code VARCHAR(100) PRIMARY KEY,
course_name VARCHAR(100) NOT NULL,
dep_id INT NOT NULL,
FOREIGN KEY (dep_id) REFERENCES department(dep_id)
);

CREATE TABLE IF NOT EXISTS lecturer (
lec_id INT AUTO_INCREMENT PRIMARY KEY,
lec_name VARCHAR(100) NOT NULL,
department VARCHAR(100) NOT NULL,
FOREIGN KEY (department) REFERENCES department(department)
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
FOREIGN KEY (request_id) REFERENCES request_form(request_id),
);

CREATE TABLE IF NOT EXISTS submitted_lecturers (
sublec_id INT AUTO_INCREMENT PRIMARY KEY,
sub_id INT NOT NULL,
lec_name VARCHAR(100) NOT NULL,
teaching VARCHAR(100) NOT NULL,
notes VARCHAR(100) NOT NULL,
FOREIGN KEY (sub_id) REFERENCES form_submit(sub_id)
);
