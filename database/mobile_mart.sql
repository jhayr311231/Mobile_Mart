-- Create mobilemart database
CREATE DATABASE IF NOT EXISTS mobilemart;

-- Use mobilemart database
USE mobilemart;

-- Create products table
CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    brand VARCHAR(50),
    description TEXT,
    category VARCHAR(50),
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT(6) NOT NULL DEFAULT 0,
    image_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Sample data for demonstration
INSERT INTO products (name, brand, description, category, price, stock_quantity, image_path) VALUES
('galaxynote10', 'Mobile Phones', 'Samsung Galaxy Note 10', 'Mobile Phones', 19900, 12, 'Images/producs-images/Mobiles/galaxynote10.png'),
('iphone12', 'Mobile Phones', 'Apple iPhone 12', 'Mobile Phones', 18000, 15, 'Images/producs-images/Mobiles/Iphone 12.png'),
('oppo', 'Mobile Phones', 'Oppo Mobile Series', 'Mobile Phones', 9490, 10, 'Images/producs-images/Mobiles/oppo1.png'),
('samsungc9', 'Mobile Phones', 'Samsung C9 Pro', 'Mobile Phones', 9780, 7, 'Images/producs-images/Mobiles/mobile.1.png'),
('pocox3', 'Mobile Phones', 'Poco X3', 'Mobile Phones', 10889, 20, 'poco.png'),
('vivo', 'Mobile Phones', 'Vivo Mobile Series', 'Mobile Phones', 7599, 6, 'vivo1.png'),
('realme', 'Mobile Phones', 'Realme Mobile Series', 'Mobile Phones', 700, 18, 'realme.png'),
('laptop1', 'Laptops', 'Description for Laptop 1', 'Laptops', 15000, 10, 'Images/producs-images/Laptops/laptop-1.png'),
('laptop2', 'Laptops', 'Description for Laptop 2', 'Laptops', 17000, 15, 'Images/producs-images/Laptops/laptop-2.png'),
('laptop3', 'Laptops', 'Description for Laptop 3', 'Laptops', 13000, 8, 'Images/producs-images/Laptops/laptop-3.png'),
('laptop4', 'Laptops', 'Description for Laptop 4', 'Laptops', 12000, 12, 'Images/producs-images/Laptops/laptop-4.png');


-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL, -- Use a more secure password hashing method
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Sample data for demonstration
INSERT INTO users (username, password) VALUES
('admin', 'hashed_password1'),
('user', 'hashed_password2');


-- Create orders table
CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    total_amount DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Create order_items table to store individual products in an order
CREATE TABLE IF NOT EXISTS order_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    quantity INT(6) NOT NULL,
    subtotal DECIMAL(10, 2) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

-- Create payments table
CREATE TABLE IF NOT EXISTS payments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6) UNSIGNED,
    payment_method VARCHAR(50) NOT NULL,
    cardholder_name VARCHAR(100) NOT NULL,
    card_number VARCHAR(20) NOT NULL,
    expiration_month VARCHAR(20) NOT NULL,
    expiration_year VARCHAR(4) NOT NULL,
    cvv VARCHAR(5) NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    transaction_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id)
);
