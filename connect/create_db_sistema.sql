/*------DROP DATABASE login;---*/
/*------DROP DATABASE login_teste;---*/

DROP DATABASE login_teste;

CREATE DATABASE login_teste;

use login_teste;

CREATE TABLE usuario (
	id_usuario int primary key auto_increment,
	nome varchar(255),
	email varchar(255),
	senha varchar(255),
    usuario_tipo character(1)
);

CREATE TABLE perguntas (
	id_pergunta int primary key auto_increment,
    id_usuario int,
	pergunta  VARCHAR(2000),
    avaliacao int(20),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
);

CREATE TABLE respostas (
	id_resposta int primary key auto_increment,
    id_pergunta int,
	resposta VARCHAR(2000),
    avaliacao int(20),
    FOREIGN KEY (id_pergunta) REFERENCES perguntas(id_pergunta)
);
/*
CREATE TABLE usuario_tipo (
	id_usuario_tipo int primary key not null auto_increment,
    id_usuario int,
    no_usuario_tipo varchar(255) not null,
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario)
    );*/

INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Felipe','filipesales19@gmail.com', md5('123'), 'U');
INSERT INTO usuario (nome, email, senha, usuario_tipo) VALUES ('Luis','luis@gmail.com', md5('123'), 'A');

INSERT INTO respostas (id_pergunta, respostas) VALUES ('12','Que nada vc e burro so acho kkkkk');

alter table respostas DROP COLUMN respostas;
alter table respostas ADD resposta LONGTEXT;

alter table usuario ADD id_usuario_tipo int;

DROP table IF EXISTS  `perguntas`;
DROP table usuario_tipo;
SELECT * FROM usuario;
SELECT * FROM perguntas;
SELECT * FROM respostas;
SELECT * FROM usuario_tipo;


SELECT * FROM perguntas p
LEFT JOIN respostas rp ON rp.id_pergunta = p.id_pergunta;
