CREATE DATABASE IF NOT EXISTS posts;
USE posts;
CREATE TABLE IF NOT EXISTS publication (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    picture VARCHAR(255) NOT NULL,
    description TEXT,
    datetime DATETIME NOT NULL,
    is_published TINYINT(1) DEFAULT 0
);