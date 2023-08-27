# CINEC-SSSQ

<h1>Use the below queries to create the database and tables before you run the system.</h1>
CREATE DATABASE CINEC_SSSQ;
<br>
<br>
USE CINEC_SSSQ;
<br>
<br>
CREATE TABLE users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    user_type ENUM('Client', 'Admin', 'Super Admin') NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE
);
<br>
<br>
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
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);
<br>
<br>
CREATE TABLE IF NOT EXISTS lecturer_names (
    id INT AUTO_INCREMENT PRIMARY KEY,
    request_id INT NOT NULL,
    lecturer_name VARCHAR(100) NOT NULL,
    FOREIGN KEY (request_id) REFERENCES request_form(request_id)
);
