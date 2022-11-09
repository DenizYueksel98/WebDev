/* DROP DATABASE IF EXISTS test;

CREATE DATABASE test;

USE test; */


CREATE TABLE `cars` (
    `id` SMALLINT(3) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(100) NOT NULL CHECK (Length (`name`) <60),
    `b21` SMALLINT(4) NOT NULL CHECK (Length(`b21`)<=4),
    `b22` SMALLINT(3) NOT NULL CHECK (Length(`b22`)<=3),
    `j` VARCHAR(2) NOT NULL CHECK (Length(`j`)<=2),
    `vier` VARCHAR(4) NOT NULL CHECK (Length(`vier`)<=4),
    `d1` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `d21` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=3),
    `d22` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=4),
    `d23` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `zwei` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `fuenf1` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `fuenf2` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `v9` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=60),
    `vierzehn` VARCHAR(50) NOT NULL CHECK (Length(`vier`)<=4),
    `p3` VARCHAR(50) NOT NULL CHECK (`p3`="BENZIN" OR `p3`="WASSERSTOFF" OR `p3`="GAS" OR`p3`="ELEKTRO" OR`p3`="DIESEL"),
    `verbin` DECIMAL(5) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbau` DECIMAL(5) NOT NULL CHECK (`verbin`between 0 and 300),
    `verbko` DECIMAL(5) NOT NULL CHECK (`verbko`between 0 and 300),
    `co2kom1` DECIMAL(5) NOT NULL CHECK (`co2kom1`between 0 and 300),
    `sehrs` DECIMAL(5) NOT NULL CHECK (`sehrs`between 0 and 300),
    `schnell` DECIMAL(5) NOT NULL CHECK (`schnell`between 0 and 300),
    `langsam` DECIMAL(5) NOT NULL CHECK (`langsam`between 0 and 300),
    `co2kom2` DECIMAL(5) NOT NULL CHECK (`co2kom2`between 0 and 300),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`d1`) REFERENCES `marke`(`brand`)
);


INSERT INTO `cars`
(`name`,
`b21`,
`b22`,
`j`,
`vier`,
`d1`,
`d21`,
`d22`,
`d23`,
`zwei`,
`fuenf1`,
`fuenf2`,
`v9`,
`vierzehn`,
`p3`,
`sehrs`,
`schnell`,
`langsam`,
`co2kom1`,
`verbin`,
`verbau`,
`verbko`,
`co2kom2`) 
VALUE 
("BMW 123", 
 8781,
 187,
 "FC",
 "SFa",
 "BMW",
 "D21",
 "8N6d",
 "7IOKOR9V",
 "5P5D5M5POJRWDFG",
 "DRDFWLRDJFLSRJEKLKSF",
 "LFKEJSLKJFELSF",
 "F2JKFSEFJSLFJSF",
 "KSLFKJELFJKSLKF",
 "BENZIN",
 8.1,
 6.18,
 4.53,
 70.34,
 6.53,
 3.61,
 4.3,
 34.5);