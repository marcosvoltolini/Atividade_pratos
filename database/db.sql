
CREATE DATABASE IF NOT EXISTS pratos_Marcos_m4;

USE pratos_Marcos_m4;

CREATE TABLE Pratos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    descricao TEXT,
    categoria VARCHAR(100),
    preco DECIMAL(10, 2) NOT NULL,
    usuario_id INT NOT NULL
);
    CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (50) NOT NULL,
    email VARCHAR (100) NOT NULL
    
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id)
);
