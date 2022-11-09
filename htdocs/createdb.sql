DROP DATABASE IF EXISTS `cars`;
CREATE DATABASE `cars`;
USE `cars`;
CREATE TABLE `marke` (
    `brand` VARCHAR(30) NOT NULL ,
    `gruendort` VARCHAR(30) NOT NULL,
    `gruendjahr` VARCHAR(30) NOT NULL,
    `mitarbeiter` VARCHAR(30) NOT NULL,
    `jahresumsatz` VARCHAR(30) NOT NULL,
    PRIMARY KEY(`brand`)
);
INSERT INTO `marke` VALUE
("MERCEDES", "Stuttgart, Detschland", 1926, 173000, 109600000000),
("CADILLAC", "Detroit, Michigan, USA", 1909, 12300, 17400000000),
("BMW", "München", 1916, 118900, 111239000000),
("KIA", "Stuttgart", 1926, 52000, 39800000000),
("VOLKSWAGEN", "Stuttgart", 1926, 192000, 250200000000);
CREATE TABLE `cars` (
    `id` SMALLINT(3) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL CHECK (Length (`name`) <60),
    `b21` SMALLINT(4) NOT NULL CHECK (Length(`b21`)<=4),
    `b22` SMALLINT(3) NOT NULL CHECK (Length(`b22`)<=3),
    `j` VARCHAR(2) NOT NULL CHECK (Length(`j`)<=2),
    `vier` VARCHAR(4) NOT NULL CHECK (Length(`vier`)<=4),
    `d1` VARCHAR(60) NOT NULL CHECK (Length(`d1`)<=60),
    `d21` VARCHAR(3) NOT NULL CHECK (Length(`d21`)<=3),
    `d22` VARCHAR(4) NOT NULL CHECK (Length(`d22`)<=4),
    `d23` VARCHAR(60) NOT NULL CHECK (Length(`d23`)<=60),
    `zwei` VARCHAR(60) NOT NULL CHECK (Length(`zwei`)<=60),
    `fuenf1` VARCHAR(60) NOT NULL CHECK (Length(`fuenf1`)<=60),
    `fuenf2` VARCHAR(60) NOT NULL CHECK (Length(`fuenf2`)<=60),
    `v9` VARCHAR(60) NOT NULL CHECK (Length(`v9`)<=60),
    `vierzehn` VARCHAR(60) NOT NULL CHECK (Length(`vierzehn`)<=60),
    `p3` VARCHAR(12) NOT NULL CHECK (`p3`="BENZIN" OR `p3`="WASSERSTOFF" OR `p3`="GAS" OR`p3`="ELEKTRO" OR`p3`="DIESEL" OR`p3`="ETHANOL"),
    `verbin` DECIMAL(4,2) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbau` DECIMAL(4,2) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbko` DECIMAL(4,2) NOT NULL CHECK (`verbko`between 0 and 300),
    `co2komN` DECIMAL(5,2) NOT NULL CHECK (`co2komN`between 0 and 300),
    `sehrs` DECIMAL(4,2) NOT NULL CHECK (`sehrs`between 0 and 300),
    `schnell` DECIMAL(4,2) NOT NULL CHECK (`schnell`between 0 and 300),
    `langsam` DECIMAL(4,2) NOT NULL CHECK (`langsam`between 0 and 300),
    `co2komW` DECIMAL(5,2) NOT NULL CHECK (`co2komW`between 0 and 300),
    `verb_unit` VARCHAR(50) NOT NULL CHECK (`verb_unit`="kWh/100km" OR `verb_unit`="l/100km"),
    `co2_unit` VARCHAR(50) NOT NULL CHECK (`co2_unit`="g/km"),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`d1`) REFERENCES `marke`(`brand`)
);

