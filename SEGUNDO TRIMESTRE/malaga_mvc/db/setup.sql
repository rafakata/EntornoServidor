CREATE DATABASE IF NOT EXISTS malaga_cf;
USE malaga_cf;

CREATE TABLE IF NOT EXISTS plantilla (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    dorsal INT UNIQUE NOT NULL,
    posicion ENUM('Portero', 'Defensa', 'Centrocampista', 'Delantero') NOT NULL,
    foto VARCHAR(255) DEFAULT 'sin_foto.png',
    goles INT DEFAULT 0
);
