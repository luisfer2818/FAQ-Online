/*------DROP DATABASE login;---*/
/*------DROP DATABASE login_teste;---*/

CREATE DATABASE login_teste;

use login_teste;

CREATE TABLE usuario (
	id_usuario int primary key auto_increment,
	nome varchar(255),
	email varchar(255),
	senha varchar(255)
);

CREATE TABLE perguntas (
	id_pergunta int primary key auto_increment,
    id_usuario int,
	pergunta LONGTEXT,
    avaliacao int(20),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE respostas (
	id_respostas int primary key auto_increment,
    id_usuario int,
	respostas LONGTEXT,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE usuario_tipo (
	id_usuario_tipo int primary key not null auto_increment,
    id_usuario int,
    no_usuario_tipo varchar(255) not null,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    );

INSERT INTO usuario (nome,email, senha) VALUES ('Felipe','filipesales19@gmail.com', md5('lipsaless'));
INSERT INTO usuario (nome,email, senha) VALUES ('luis','luis@gmail.com', md5('1234'));

alter table perguntas DROP COLUMN avaliacao;
alter table perguntas ADD avaliacao int(20);

SELECT * FROM usuario;
SELECT * FROM perguntas;
SELECT * FROM respostas;
SELECT * FROM usuario_tipo;