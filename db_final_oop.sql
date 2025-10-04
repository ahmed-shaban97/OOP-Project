CREATE DATABASE if not EXISTS `final_pro_oop`;
use `final_pro_oop`;

CREATE TABLE roles(
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 

);

INSERT INTO `roles` (name) VALUES 
('owner'),
('admin'),
('user');


CREATE TABLE users(
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null,
    email varchar(255) not null,
	password varchar(255) not null,
    phone char(15) ,
    role_id int,
    CONSTRAINT fk_role_id FOREIGN KEY (role_id) REFERENCES roles(id) ON UPDATE CASCADE ON DELETE SET null,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
	updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO `users` (name,email,phone,role)VALUES
('Ahmed','ahmedelhagar0gmail.com','01207408949',2)
('Ahmed','ahmedshaban0gmail.com','01123065838',2);


CREATE TABLE categorys(
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null,    
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO `categorys` (name)VALUES 
('Arabic Books'),
('English Books');

CREATE TABLE brands(
	id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO `brands` (name,) VALUES 
('Arabic '),
('English ');

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    image VARCHAR(255),
    description TEXT,
    stock_qty INT NOT NULL DEFAULT 0,
    category_id INT NOT NULL,
    brand_id INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	CONSTRAINT fk_category_id FOREIGN KEY (category_id) REFERENCES catogory(id),
    ON UPDATE CASCADE
    ON DELETE SET null,
	CONSTRAINT fk_brand_id FOREIGN KEY (brand_id) REFERENCES brand(id),
    ON UPDATE CASCADE
    ON DELETE SET null,
);

INSERT INTO `products` (name,price,stoce_qty,description,image,catecory_id,brand_id)VALUES 
('Black Beauty',1000,'Black Beauty: His Grooms and Companions, the Autobiography of a Horse is an 1877 novel by English author Anna Sewell',1,1,1);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_price DECIMAL(10,2) NOT NULL,
    status ENUM('pending','processing','shipped','delivered','canceled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE SET null,

);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_order_id FOREIGN KEY (order_id) REFERENCES orders(id) ON UPDATE CASCADE ON DELETE SET null,
    CONSTRAINT fk_product_id  FOREIGN KEY (product_id) REFERENCES products(id) ON UPDATE CASCADE ON DELETE SET null,
);

CREATE TABLE cart(
	id int AUTO_INCREMENT PRIMARY KEY,
    user_id int,
    CONSTRAINT fk_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON UPDATE CASCADE ON DELETE SET null,
    create_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

CREATE TABLE cart_item(
	id int AUTO_INCREMENT PRIMARY KEY,
    cart_id int,
    product_id int,  
    CONSTRAINT fk_cart_id FOREIGN KEY (cart_id) REFERENCES cart(id) ON UPDATE CASCADE ON DELETE SET null,
    CONSTRAINT fk_product_id FOREIGN KEY (product_id) REFERENCES products(id) ON UPDATE CASCADE ON DELETE SET null,
    quantity INT NOT NULL DEFAULT 1
);

CREATE TABLE contact (
  id AUTO_INCREMENT PRIMARY KEY,
  user_id int NULL,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  CONSTRAINT fk_contact_user FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE SET NULL
);

