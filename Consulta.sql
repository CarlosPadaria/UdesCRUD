DROP DATABASE if EXISTS udescrud;
CREATE DATABASE udescrud;
USE udescrud;

CREATE TABLE USUARIO(
	id INT NOT NULL AUTO_INCREMENT,
	nome VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	senha VARCHAR(32) NOT NULL,
	PRIMARY KEY(id)
);

INSERT INTO USUARIO(nome,email,senha) VALUES ('Felipe', 'felipemalicheski@gmail.com','senha123');
SELECT * FROM USUARIO;