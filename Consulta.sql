DROP DATABASE if EXISTS udescrud;
CREATE DATABASE udescrud;
USE udescrud;

CREATE TABLE USUARIO(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	email VARCHAR(100) UNIQUE NOT NULL,
	senha VARCHAR(32) NOT NULL,
	isAdmin boolean NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO USUARIO(nome, email, senha, isAdmin)
VALUES ('Felipe', 'felipemalicheski@gmail.com','senha123', TRUE);
INSERT INTO USUARIO(nome, email, senha, isAdmin)
VALUES ('Paulo Jocelio', 'paulo@gmail.com','senha123', FALSE);
SELECT * FROM USUARIO;