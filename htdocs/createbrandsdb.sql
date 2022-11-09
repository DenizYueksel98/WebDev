USE `test`;

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

