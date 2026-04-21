-- მონაცემთა ბაზის შექმნა საბანკო სისტემისთვის
CREATE DATABASE IF NOT EXISTS banking_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE banking_db;

-- კლიენტები
CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    personal_number VARCHAR(11) NOT NULL UNIQUE,
    address TEXT,
    phone VARCHAR(20)
);

-- ფილიალები
CREATE TABLE IF NOT EXISTS branches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    address TEXT
);

-- ანგარიშები
CREATE TABLE IF NOT EXISTS accounts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    client_id INT NOT NULL,
    branch_id INT NOT NULL,
    account_number VARCHAR(20) NOT NULL UNIQUE,
    account_type ENUM('Checking', 'Savings', 'Credit') DEFAULT 'Checking',
    balance DECIMAL(15, 2) DEFAULT 0.00,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (client_id) REFERENCES clients(id) ON DELETE CASCADE,
    FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE RESTRICT
);

-- ტრანზაქციები
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    transaction_type ENUM('Deposit', 'Withdrawal', 'Transfer') NOT NULL,
    amount DECIMAL(15, 2) NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    description VARCHAR(255),
    FOREIGN KEY (account_id) REFERENCES accounts(id) ON DELETE CASCADE
);

-- მონაცემების ჩასმა
INSERT INTO clients (first_name, last_name, personal_number, address, phone) VALUES 
('ნიკოლოზ', 'ბანკირი', '01010101010', 'თბილისი, ჭავჭავაძის გამზ.', '599123456'),
('სალომე', 'კლიენტი', '02020202020', 'ბათუმი, მემედ აბაშიძის ქ.', '599654321'),
('მამუკა', 'მეანაბრე', '03030303030', 'ქუთაისი, წერეთლის ქ.', '599987654');

INSERT INTO branches (name, city, address) VALUES 
('მთავარი ფილიალი', 'თბილისი', 'რუსთაველის გამზ. 10'),
('ბათუმის ფილიალი', 'ბათუმი', 'ერას მოედანი'),
('ქუთაისის ფილიალი', 'ქუთაისი', 'თამარ მეფის ქ. 5');

INSERT INTO accounts (client_id, branch_id, account_number, account_type, balance) VALUES 
(1, 1, 'GE00TB0123456789', 'Checking', 15000.50),
(2, 2, 'GE00TB9876543210', 'Savings', 50000.00),
(3, 3, 'GE00TB1112223334', 'Credit', -500.00);

INSERT INTO transactions (account_id, transaction_type, amount, description) VALUES 
(1, 'Deposit', 2000.00, 'ხელფასის ჩარიცხვა'),
(2, 'Transfer', 500.00, 'გადარიცხვა ოჯახის წევრზე'),
(3, 'Withdrawal', 100.00, 'ბანკომატიდან თანხის გატანა');
