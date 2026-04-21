CREATE DATABASE IF NOT EXISTS hotel_reservation_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE hotel_reservation_db;

CREATE TABLE IF NOT EXISTS room_types (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    base_price DECIMAL(10, 2) NOT NULL,
    capacity INT NOT NULL
);

CREATE TABLE IF NOT EXISTS rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(10) NOT NULL UNIQUE,
    room_type_id INT NOT NULL,
    floor INT,
    status ENUM('Available', 'Occupied', 'Maintenance') DEFAULT 'Available',
    FOREIGN KEY (room_type_id) REFERENCES room_types(id) ON DELETE CASCADE
);

CREATE TABLE IF NOT EXISTS guests (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20) NOT NULL,
    identity_document VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS reservations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    guest_id INT NOT NULL,
    room_id INT NOT NULL,
    check_in_date DATE NOT NULL,
    check_out_date DATE NOT NULL,
    total_price DECIMAL(10, 2) NOT NULL,
    status ENUM('Booked', 'CheckedIn', 'CheckedOut', 'Cancelled') DEFAULT 'Booked',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (guest_id) REFERENCES guests(id) ON DELETE CASCADE,
    FOREIGN KEY (room_id) REFERENCES rooms(id) ON DELETE CASCADE
);

INSERT INTO room_types (name, base_price, capacity) VALUES 
('Standard Single', 100.00, 1),
('Double Deluxe', 250.00, 2),
('Presidential Suite', 1000.00, 4);

INSERT INTO rooms (room_number, room_type_id, floor, status) VALUES 
('101', 1, 1, 'Available'),
('205', 2, 2, 'Occupied'),
('501', 3, 5, 'Maintenance');

INSERT INTO guests (first_name, last_name, email, phone, identity_document) VALUES 
('ალექსანდრე', 'სტუმარი', 'alex@mail.ge', '555223344', '01010101010'),
('ნინო', 'ტურისტი', 'nino@mail.ge', '555778899', '02020202020'),
('გიორგი', 'ბიზნესმენი', 'giorgi@mail.ge', '555990011', '03030303030');

INSERT INTO reservations (guest_id, room_id, check_in_date, check_out_date, total_price, status) VALUES 
(1, 1, '2026-05-10', '2026-05-15', 500.00, 'Booked'),
(2, 2, '2026-04-20', '2026-04-25', 1250.00, 'CheckedIn'),
(3, 3, '2026-06-01', '2026-06-05', 4000.00, 'Booked');
