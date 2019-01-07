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
	temporada date
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
	Jogo INT PRIMARY KEY
) ;

CREATE TABLE Resultado( 
	id_resultado INT PRIMARY KEY,
	resultado_1 INTEGER,
	resultado_2 INTEGER
) ;

CREATE TABLE Hoquei(

	id_hoquei INTEGER PRIMARY KEY,
	set_n INTEGER,
	pontos_1 INTEGER,
	pontos_2 INTEGER
) ;

CREATE TABLE Tenis(
	id_hoquei INTEGER PRIMARY KEY,
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
ALTER TABLE Participantes ADD FOREIGN KEY (Jogo) REFERENCES Jogo(id_jogo);

ALTER TABLE Liga ADD Pais INTEGER;
ALTER TABLE Liga ADD FOREIGN KEY (Pais) REFERENCES Pais(id_pais);
ALTER TABLE Liga ADD Desporto INTEGER;
ALTER TABLE Liga ADD FOREIGN KEY (Desporto) REFERENCES Desporto(id_desporto);

ALTER TABLE Resultado ADD Jogo INTEGER;
ALTER TABLE Resultado ADD FOREIGN KEY (Jogo) REFERENCES Jogo(id_jogo);

ALTER TABLE Hoquei ADD Resultado INTEGER;
ALTER TABLE Hoquei ADD FOREIGN KEY (Resultado) REFERENCES Resultado(id_resultado);

ALTER TABLE Tenis ADD Resultado INTEGER;
ALTER TABLE Tenis ADD FOREIGN KEY (Resultado) REFERENCES Resultado(id_resultado);

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
(7,'Colombia'),
(8,'Germany'),
(9,'Belgium'),
(10,'Italy')

insert into Jogador values 
(1,'Cristiano Ronaldo', 1, 'Forward','02-05-1985'), 
(2,'Mohamed Salah', 6, 'Forward','06-15-1992'),
(3,'Manuel Neuer', 8, 'Goalkeeper','03-27-1986'),
(4,'Kevin De Bruyne', 9, 'Right Middlefielder','06-28-1991'),
(5,'Alex Sandro', 2, 'Left Back','01-26-1991')

insert into Liga values 
(1,'Liga NOS','01-18-2019',1,1),
(2,'Bundesliga','01-18-2019',8,1),
(3,'Premier League','01-18-2019',3,1), 
(4,'Liga BBVA','01-18-2019',4,1) ,
(5,'Serie A','01-18-2019',10,1),
(6,'DEL','01-18-2019',8,4)

insert into Equipa values
(1,'Juventus FC',NULL,1,5),
(2,'Liverpool FC',NULL,1,3),
(3,'FC Bayern Munich',NULL,1,2),
(4,'Real Madrid FC',NULL,1,4),
(5,'Vitoria FC',NULL,1,1),
(6,'Manchester United FC',NULL,1,3),
(7,'AS Roma',NULL,1,5),
(8,'Borussia Dortmund',NULL,1,2),
(9,'Augsburg',NULL,4,6),
(10,'Düsseldorf',NULL,4,6)

insert into Epoca values
(1,'2018-2019',1,1),
(2,'2018-2019',2,2),
(3,'2018-2019',3,3),
(4,'2018-2019',1,5)

insert into Jogo values
(1,'In progress','01:26:23','Allianz Stadium','08:00:00PM',5,1),
(2,'Finished','00:00:00','Anfield','08:00:00PM',3,1),
(3,'In progress','00:39:23','Santiago Bernabéu Stadium','09:30:00PM',4,1),
(4,'In progress','00:23:10','Allianz Arena','08:00:00PM',2,1),
(5,'Finished','00:00:00','Curt Frenzel Stadium','01:00:00PM',6,4)


insert into Participantes values
(2,2,6),
(4,3,8),
(1,1,7),
(5,9,10)

insert into Resultado values
(1,1,3,2),
(2,1,1,3),
(3,1,1,4),
(4,2,0,1),
(5,3,6,5)

insert into Hoquei values
(3,1,0,0,5),
(1,2,1,3,5),
(2,3,2,3,5)

/* Mostrar quais os jogos que já terminaram, indicando a hora que começaram e o estádio em que decorreram */
SELECT Jogo.hora_i,Jogo.estadio FROM Jogo WHERE Jogo.estado='Finished'

/* Indicar quais as equipas que ainda não jogaram */
SELECT Equipa.nome FROM Equipa
INNER JOIN Jogo ON Equipa.Liga NOT IN(
	SELECT Jogo.Liga FROM Jogo
)GROUP BY Equipa.nome

/* Indicar o nome das equipas que pertencem à Premier League, criando primeiro uma vista que obtenha os id´s das equipas
pertencentes a essa liga, e utilizar essa vista para obter os nomes */
CREATE VIEW equipas_liga_inglesa AS
SELECT Equipa.id_equipa FROM Equipa WHERE Equipa.Liga=3
GROUP BY Equipa.id_equipa

SELECT Equipa.nome FROM equipas_liga_inglesa
INNER JOIN Equipa ON equipas_liga_inglesa.id_equipa=Equipa.id_equipa

/* Alterar a equipa a que um jogador pertence caso ocorra uma transferência */
UPDATE Epoca SET Equipa=4 WHERE Jogador=1