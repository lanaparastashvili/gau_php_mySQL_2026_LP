-- მონაცემთა ბაზის შექმნა ონლაინ გაყიდვებისთვის
CREATE DATABASE IF NOT EXISTS online_sales_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE online_sales_db;

-- მომხმარებლების/მომხმარებლების ცხრილი
CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    phone VARCHAR(20)
);

-- პროდუქტების კატეგორიები
CREATE TABLE IF NOT EXISTS product_categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

-- პროდუქტები
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (category_id) REFERENCES product_categories(id) ON DELETE SET NULL
);

-- შეკვეთები
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(10, 2) NOT NULL,
    status ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

-- შეკვეთის დეტალები
CREATE TABLE IF NOT EXISTS order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE RESTRICT
);

-- მონაცემების ჩასმა
INSERT INTO customers (first_name, last_name, email, phone) VALUES 
('თამარ', 'მეფე', 'tamar@email.ge', '555123456'),
('დავით', 'აღმაშენებელი', 'davit@email.ge', '555987654'),
('ილია', 'ჭავჭავაძე', 'ilia@email.ge', '555112233');

INSERT INTO product_categories (name) VALUES 
('ტექნიკა'),
('წიგნები'),
('ტანსაცმელი');

INSERT INTO products (category_id, name, description, price, stock_quantity) VALUES 
(1, 'ლეპტოპი', 'ძლიერი პროგრამირებისთვის', 2500.00, 10),
(2, 'ვეფხისტყაოსანი', 'შოთა რუსთაველის პოემა', 45.50, 100),
(3, 'მაისური', 'ბამბის მაისური ზაფხულისთვის', 25.00, 50);

INSERT INTO orders (customer_id, total_amount, status) VALUES 
(1, 2500.00, 'Delivered'),
(2, 45.50, 'Shipped'),
(3, 75.00, 'Pending');

INSERT INTO order_items (order_id, product_id, quantity, unit_price) VALUES 
(1, 1, 1, 2500.00),
(2, 2, 1, 45.50),
(3, 3, 3, 25.00);
