-- მონაცემთა ბაზის შექმნა ბლოგისთვის
CREATE DATABASE IF NOT EXISTS blog_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE blog_db;

-- მომხმარებლების ცხრილი
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- კატეგორიების ცხრილი
CREATE TABLE IF NOT EXISTS categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL UNIQUE
);

-- პოსტების ცხრილი
CREATE TABLE IF NOT EXISTS posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category_id INT,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE SET NULL
);

-- კომენტარების ცხრილი
CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    user_id INT NOT NULL,
    comment_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- მონაცემების ჩასმა
INSERT INTO users (username, email, password_hash) VALUES 
('admin', 'admin@blog.ge', 'hashedpassword1'),
('george', 'george@blog.ge', 'hashedpassword2'),
('nino_writer', 'nino@blog.ge', 'hashedpassword3');

INSERT INTO categories (name) VALUES 
('ტექნოლოგიები'),
('მოგზაურობა'),
('განათლება');

INSERT INTO posts (user_id, category_id, title, content) VALUES 
(1, 1, 'ხელოვნური ინტელექტი 2026 წელს', 'ბლოგპოსტის ტექსტი ხელოვნური ინტელექტის შესახებ...'),
(2, 2, 'მოგზაურობა სვანეთში', 'ბლოგპოსტის ტექსტი სვანეთის შესახებ...'),
(3, 3, 'პროგრამირების საფუძვლები', 'ბლოგპოსტის ტექსტი პროგრამირებაზე...');

INSERT INTO comments (post_id, user_id, comment_text) VALUES 
(1, 2, 'ძალიან საინტერესო სტატიაა შინაარსობრივად!'),
(2, 3, 'შესანიშნავი ფოტოებია!'),
(3, 1, 'მადლობა კარგი ინფორმაციისთვის.');
