CREATE TABLE listajogos (
    id INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(150) NOT NULL,
    genero VARCHAR(100),
    data_lancamento DATE,
    id_genero INT,
    id_console INT,
    img VARCHAR(100),
    PRIMARY KEY (id)
);

CREATE TABLE console (
    id_console INT AUTO_INCREMENT PRIMARY KEY,
    nome_console VARCHAR(100) NOT NULL,
    fabricante VARCHAR(100) NOT NULL,
    ano_lancamento YEAR NOT NULL,
    geracao VARCHAR(50),
    preco_lancamento DECIMAL(10,2)
);

INSERT INTO console (nome_console, fabricante, ano_lancamento, geracao, preco_lancamento)
VALUES
('PlayStation 5', 'Sony', 2020, '9ª geração', 499.99),
('Xbox Series X', 'Microsoft', 2020, '9ª geração', 499.99),
('Nintendo Switch', 'Nintendo', 2017, '8ª geração', 299.99);

CREATE TABLE genero (
    id_genero INT AUTO_INCREMENT PRIMARY KEY,
    nome_genero VARCHAR(100) NOT NULL,
    descricao TEXT
);

ALTER TABLE listajogos
ADD CONSTRAINT fk_jogo_genero FOREIGN KEY (id_genero) REFERENCES genero(id_genero),
ADD CONSTRAINT fk_jogo_console FOREIGN KEY (id_console) REFERENCES console(id_console);
