CREATE DATABASE IF NOT EXISTS university_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE university_db;

CREATE TABLE IF NOT EXISTS departments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL UNIQUE
);

CREATE TABLE IF NOT EXISTS professors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    enrollment_year INT NOT NULL
);

CREATE TABLE IF NOT EXISTS courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT,
    professor_id INT,
    course_name VARCHAR(150) NOT NULL,
    credits INT NOT NULL,
    FOREIGN KEY (department_id) REFERENCES departments(id) ON DELETE SET NULL,
    FOREIGN KEY (professor_id) REFERENCES professors(id) ON DELETE SET NULL
);

CREATE TABLE IF NOT EXISTS enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT NOT NULL,
    course_id INT NOT NULL,
    semester VARCHAR(20) NOT NULL,
    grade VARCHAR(2),
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

INSERT INTO departments (name) VALUES 
('კომპიუტერული მეცნიერებები'),
('ბიზნესის ადმინისტრირება'),
('ხელოვნება');

INSERT INTO professors (department_id, first_name, last_name, email) VALUES 
(1, 'ზურაბ', 'პროგრამისტი', 'zurab@uni.ge'),
(2, 'ნათია', 'მენეჯერი', 'natia@uni.ge'),
(1, 'გიორგი', 'დეველოპერი', 'giorgi@uni.ge');

INSERT INTO students (first_name, last_name, email, enrollment_year) VALUES 
('ანა', 'სტუდენტაშვილი', 'ana@uni.ge', 2025),
('ლუკა', 'სწავლული', 'luka@uni.ge', 2024),
('ელენე', 'მონდომებული', 'elene@uni.ge', 2026);

INSERT INTO courses (department_id, professor_id, course_name, credits) VALUES 
(1, 1, 'ალგორითმები და მონაცემთა სტრუქტურები', 6),
(2, 2, 'მარკეტინგის საფუძვლები', 5),
(1, 3, 'ვებ-პროგრამირება (PHP/JS)', 6);

INSERT INTO enrollments (student_id, course_id, semester, grade) VALUES 
(1, 1, 'Fall 2025', 'A'),
(2, 2, 'Spring 2025', 'B'),
(3, 3, 'Fall 2026', 'A');
