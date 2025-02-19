-- MySQL
CREATE DATABASE ju_exams;
USE ju_exams;

CREATE TABLE exam_registrations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id VARCHAR(20) NOT NULL,
    name VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    semester VARCHAR(10) NOT NULL,
    exam_type VARCHAR(20) NOT NULL,
    course_codes VARCHAR(255) NOT NULL,
    exam_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
