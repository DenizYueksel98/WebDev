DROP DATABASE IF EXISTS wwi2021a;
CREATE DATABASE wwi2021a;
USE wwi2021a;
CREATE TABLE users(
    id INT NOT NULL AUTO_INCREMENT,
    username VARCHAR(20) NOT NULL,
    password VARCHAR(20) NOT NULL,
    firstname VARCHAR(20) NOT NULL,
    lastname VARCHAR(20) NOT NULL,
    timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (ID)
) ENGINE=INNODB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
CREATE TABLE `cars`.`xml` (
    `id` SMALLINT(3) NOT NULL ,
    `name` VARCHAR(100) NOT NULL ,
    `b21` SMALLINT(4) NOT NULL , 
    `b22` SMALLINT(3) NOT NULL ,
  `j` CHAR(2) NOT NULL , 
  `vier` CHAR(4) NOT NULL ,
  `d1` VARCHAR(50) NOT NULL ,
  `d21` VARCHAR(50) NOT NULL ,
  `d22` VARCHAR(50) NOT NULL ,
  `d23` VARCHAR(50) NOT NULL , 
  `zwei` VARCHAR(50) NOT NULL ,
  `fuenf1` VARCHAR(50) NOT NULL , 
  `fuenf2` VARCHAR(50) NOT NULL ,
  `v9` VARCHAR(50) NOT NULL ,
  `vierzehn` VARCHAR(50) NOT NULL , 
  `p3` VARCHAR(50) NOT NULL ,
  `verbin` DECIMAL(5) NOT NULL,
  `verbin_unit` VARCHAR(5) NOT NULL,
  `verbau` DECIMAL(5) NOT NULL ,
   `verbko` DECIMAL(5) NOT NULL ,
             `co2kom` DECIMAL(5) NOT NULL ,
              `sehrs` DECIMAL(5) NOT NULL , 
              `schnell` DECIMAL(5) NOT NULL , 
              `langsam` DECIMAL(5) NOT NULL , 
              `co2komb` DECIMAL(5) NOT NULL ) ENGINE = InnoDB;