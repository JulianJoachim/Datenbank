-- Kommentar
--

DROP DATABASE IF EXISTS gruppe25;

CREATE DATABASE IF NOT EXISTS gruppe25;

USE gruppe25;

CREATE TABLE IF NOT EXISTS produkte
(
id INT PRIMARY KEY AUTO_INCREMENT,
bezeichnung VARCHAR(50) NOT NULL,
preis DOUBLE(10,2) NOT NULL
);

LOAD DATA INFILE 'C:/xampp/htdocs/Abgabe 4/produkte.csv' 
INTO TABLE produkte 
FIELDS TERMINATED BY ';' 
(bezeichnung, preis);


-- -- DML
-- INSERT INTO produkte(bezeichnung, preis) VALUES 
-- ('Pizza', 1.30),
-- ('Tomatenmark', 0.40),
-- ('Brötchen', 0.10);
-- 
-- UPDATE produkte SET bezeichnung = "Baguette" WHERE id = 3;
-- DELETE FROM produkte WHERE bezeichnung LIKE "P%";
-- 
-- SELECT * FROM produkte;
-- SELECT bezeichnung FROM produkte WHERE id >=1;
