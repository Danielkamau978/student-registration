-- creating database if it does not exist
CREATE DATABASE IF NOT EXISTS school_db;
-- Switch to the target database
USE school_db;
-- Create students table if it does not  exist
CREATE TABLE IF NOT EXISTS students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    course VARCHAR(100) NOT NULL,
    age INT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;