USE test;

CREATE TABLE `cars` (
    `id` SMALLINT(3) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL CHECK (Length (nachname) <60),
    `b21` SMALLINT(4) NOT NULL CHECK (Length(`b21`)<=4),
    `b22` SMALLINT(3) NOT NULL CHECK (Length(`b22`)<=3),
    `j` CHAR(2) NOT NULL CHECK (Length(`j`)<=2),
    `vier` CHAR(4) NOT NULL CHECK (Length(`vier`)<=4),
    `d1` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `d21` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=3),
    `d22` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=4),
    `d23` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `zwei` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `fuenf1` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `fuenf2` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `v9` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `vierzehn` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=4),
    `p3` VARCHAR(50) NOT NULL CHECK (`p3`="BENZIN" OR `p3`="WASSERSTOFF" OR `p3`="GAS" OR`p3`="ELEKTRO" OR`p3`="DIESEL");
    `verbin` DECIMAL(5) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbin_unit` VARCHAR(5) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbau` DECIMAL(5) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbko` DECIMAL(5) NOT NULL CHECK (`verbko`between 0 and 300),
    `co2kom` DECIMAL(5) NOT NULL CHECK (`co2kom`between 0 and 300),
    `sehrs` DECIMAL(5) NOT NULL CHECK (`sehrs`between 0 and 300),
    `schnell` DECIMAL(5) NOT NULL CHECK (`schnell`between 0 and 300),
    `langsam` DECIMAL(5) NOT NULL CHECK (`langsam`between 0 and 300),
    `co2komb` DECIMAL(5) NOT NULL CHECK (`co2komb`between 0 and 300),
    PRIMARY KEY (id)
) 
