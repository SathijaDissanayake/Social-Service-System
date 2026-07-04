CREATE DATABASE social_service_db;

USE social_service_db;

CREATE TABLE users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin','user') NOT NULL
);

CREATE TABLE services(
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

CREATE TABLE applications(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    service_id INT NOT NULL,
    reason TEXT NOT NULL,
    status VARCHAR(20) DEFAULT 'Pending',

    FOREIGN KEY(user_id) REFERENCES users(id),
    FOREIGN KEY(service_id) REFERENCES services(id)
);

-- Insert Default Users

INSERT INTO users(fullname,username,password,role)
VALUES
('Administrator','admin','admin123','admin'),
('Default User','uoc','uoc','user');

-- Insert Sample Services

INSERT INTO services(service_name,description)
VALUES
('Food Assistance','Receive monthly food packs'),

('Medical Assistance','Financial support for hospital expenses'),

('Education Grant','Support for educational expenses');