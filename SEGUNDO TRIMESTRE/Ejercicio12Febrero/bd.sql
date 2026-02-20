CREATE DATABASE IF NOT EXISTS curso_cesur;
USE curso_cesur;

CREATE TABLE IF NOT EXISTS usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    ultima_visita DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS asistencia(
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    horas INT NOT NULL,
    estado VARCHAR(20) NOT NULL
);

--Insertar un usuario de ejemplo
--Usuario: Rafa
--Email:rafa@correo.com
--Password: 123456 (encriptada en MD5)
INSERT INTO usuarios (usuario,email,password,ultima_visita)VALUES
('Rafa','rafa@correo.com', '81dc9bdb52d04dc20036dbd8313ed055', CURRENT_TIMESTAMP);

--Datos de ejemplo
INSERT INTO asistencia (fecha,horas,estado) VALUES
('2024-01-01', 8, 'Presente'),
('2024-01-02', 0, 'Ausente'),
('2024-01-03', 8, 'Presente'),
('2024-01-04', 6, 'Tarde'),
('2024-01-05', 8, 'Presente'),
('2024-01-06', 0, 'Ausente'),
('2024-01-07', 8, 'Presente'),
('2024-01-08', 8, 'Presente'),
('2024-01-09', 0, 'Ausente'),
('2024-01-10', 8, 'Presente');