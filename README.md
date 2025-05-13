# PDV-GENERICO

CREATE DATABASE IF NOT EXISTS pdv_php;

use pdv_php;

CREATE TABLE vendas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    cliente VARCHAR(100),
    total DECIMAL(10, 2) NOT NULL
);

CREATE TABLE venda_produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    venda_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade INT NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (venda_id) REFERENCES vendas(id),
    FOREIGN KEY (produto_id) REFERENCES produtos(id)
);

CREATE TABLE estoque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item VARCHAR(100) NOT NULL,
    quantidade INT NOT NULL,
    unidade VARCHAR(20) NOT NULL,
    validade DATE
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(100) NOT NULL,
    descricao TEXT,
    preco DECIMAL(10, 2) NOT NULL,
    disponivel BOOLEAN NOT NULL DEFAULT TRUE
);

CREATE TABLE funcionarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cargo VARCHAR(50) NOT NULL,
    telefone VARCHAR(20)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha_hash VARCHAR(255) NOT NULL
);

INSERT INTO usuarios (usuario, senha_hash)
VALUES (
    'yuri',
    SHA2('123', 256)
);