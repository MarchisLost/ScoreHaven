CREATE DATABASE bd_trab1;
USE bd_trab1;

CREATE TABLE Equipa(
	id_equipa INT PRIMARY KEY,
	nome NVARCHAR(40),
	simbolo VARBINARY(MAX)
) ;

CREATE TABLE Jogador(
	id_jogador INT PRIMARY KEY,
	nome NVARCHAR(40),
	nacionalidade NVARCHAR(40),
	posicao NVARCHAR(40),
	data_nasc date
) ;

CREATE TABLE Desporto(
	id_desporto INT PRIMARY KEY,
	nome NVARCHAR(40)
) ;

CREATE TABLE Pais(
	id_pais INT PRIMARY KEY,
	nome NVARCHAR(40)
) ;

CREATE TABLE Liga(	
	id_liga INT PRIMARY KEY,
	nome NVARCHAR(40),
	temporada NVARCHAR(40)
) ;

CREATE TABLE Jogo(
	id_jogo INT PRIMARY KEY,
	estado NVARCHAR(40),
	tempo TIME,
	estadio NVARCHAR(40),
	hora_i TIME
) ;

CREATE TABLE Epoca(
	id_epoca INTEGER PRIMARY KEY,
	nome NVARCHAR(40)
) ;

CREATE TABLE Participantes(
	id_participantes INT PRIMARY KEY
) ;

CREATE TABLE Resultado(
	id_resultado INT PRIMARY KEY,
	resultado_1 INTEGER,
	resultado_2 INTEGER
) ;

CREATE TABLE Hoquei(
	id_hoquei INTEGER REFERENCES Resultado(id_resultado),
	PRIMARY KEY(id_hoquei),
	set_n INTEGER,
	pontos_1 INTEGER,
	pontos_2 INTEGER
) ;

CREATE TABLE Tenis(
	id_tenis INTEGER REFERENCES Resultado(id_resultado),
	PRIMARY KEY(id_tenis),
	set_n INTEGER,
	pontos_1 INTEGER,
	pontos_2 INTEGER
) ;

ALTER TABLE Equipa ADD Desporto INTEGER;  
ALTER TABLE Equipa ADD FOREIGN KEY (Desporto) REFERENCES Desporto(id_desporto);
ALTER TABLE Equipa ADD Liga INTEGER;
ALTER TABLE Equipa ADD FOREIGN KEY (Liga) REFERENCES Liga(id_liga);

ALTER TABLE Epoca ADD Equipa INTEGER;
ALTER TABLE Epoca ADD FOREIGN KEY (Equipa) REFERENCES Equipa(id_equipa);
ALTER TABLE Epoca ADD Jogador INTEGER;
ALTER TABLE Epoca ADD FOREIGN KEY (Jogador) REFERENCES Jogador(id_jogador);

ALTER TABLE Jogo ADD Liga INTEGER;
ALTER TABLE Jogo ADD FOREIGN KEY (Liga) REFERENCES Liga(id_liga);
ALTER TABLE Jogo ADD Desporto INTEGER;
ALTER TABLE Jogo ADD FOREIGN KEY (Desporto) REFERENCES Desporto(id_desporto);

ALTER TABLE Participantes ADD Equipa_1 INTEGER;
ALTER TABLE Participantes ADD FOREIGN KEY (Equipa_1) REFERENCES Equipa(id_equipa);
ALTER TABLE Participantes ADD Equipa_2 INTEGER;
ALTER TABLE Participantes ADD FOREIGN KEY (Equipa_2) REFERENCES Equipa(id_equipa);
ALTER TABLE Participantes ADD Jogo INTEGER;
ALTER TABLE Participantes ADD FOREIGN KEY (Jogo) REFERENCES Jogo(id_jogo);

ALTER TABLE Liga ADD Pais INTEGER;
ALTER TABLE Liga ADD FOREIGN KEY (Pais) REFERENCES Pais(id_pais);
ALTER TABLE Liga ADD Desporto INTEGER;
ALTER TABLE Liga ADD FOREIGN KEY (Desporto) REFERENCES Desporto(id_desporto);

insert into Desporto values 
(1,'Soccer'), 
(2,'Basketball'), 
(3,'Volleyball'),
(4,'Hockey'),
(5,'Tennis'),
(6,'A.M Footbal')

insert into Pais values 
(1,'Portugal'), 
(2,'Brazil'), 
(3,'England'),
(4,'Spain'),
(5,'Argentina'),
(6,'Egypt'),
(7,'Colombia');

insert into Pais values 
(1,'Portugal'), 
(2,'Brazil'), 
(3,'England'),
(4,'Spain'),
(5,'Argentina'),
(6,'Egypt'),
(7,'Colombia');
