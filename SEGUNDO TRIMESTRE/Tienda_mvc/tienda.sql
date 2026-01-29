CREATE DATABASE tienda;
USE tienda;
CREATE TABLE productos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    stock INT NOT NULL
);

INSERT INTO productos (nombre, precio, stock) VALUES
('Camiseta', 19.99, 100),
('Pantalones', 39.99, 50),
('Zapatos', 59.99, 30),
('Gorra', 14.99, 75);