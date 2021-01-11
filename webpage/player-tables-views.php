<?php

$sqle = "CREATE TABLE IF NOT EXISTS applicant(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	fname VARCHAR(30) NOT NULL,
	lname VARCHAR(30) NOT NULL,
	email VARCHAR(100) NOT NULL UNIQUE,
	address VARCHAR(100) ,
	city VARCHAR(20) NOT NULL,
	street VARCHAR(100) NOT NULL,	
	zip INT(5) NOT NULL,
	phone VARCHAR(11) NOT NULL,
	blood_group CHAR(2) NOT NULL,
    rh CHAR(1) NOT NULL,
    birth_certificate VARCHAR(17) UNIQUE NOT NULL,
	nid VARCHAR(10) UNIQUE NOT NULL,
	gender CHAR(6) NOT NULL, 
	birth_date DATE NOT NULL,
	nationality VARCHAR(12) NOT NULL,
    `applied_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `image` VARCHAR(200) NOT NULL,
    FOREIGN KEY(id) REFERENCES player(id)
);";

$sqle .= "CREATE TABLE IF NOT EXISTS `player`(
	`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
    `address` VARCHAR(100),
    `city` VARCHAR(20) NOT NULL,
    `street` VARCHAR(100) NOT NULL,
    `zip` INT(5) NOT NULL,
    `phone` varchar(11) NOT NULL,
    `blood_group` CHAR(2) NOT NULL,
    `rh` char(1) NOT NULL,
    `birth_certificate` varchar(17) NOT NULL,
    `nid` varchar(15),
    `gender` varchar(7) NOT NULL,
    `birthDate` DATE NOT NULL,
    `regDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `coach_id` INT(6),
    `position` VARCHAR(30),
    `prestatus` CHAR(1),
    `nationality` varchar(12),
    `applied_date` DATE,
    `image` VARCHAR(200) NOT NULL,
    FOREIGN KEY (rh) REFERENCES blood_factor(id),
    FOREIGN KEY(coach_id) REFERENCES coach(id)
);";

$sqle .=    "CREATE OR REPLACE VIEW applicants AS 
SELECT id, CONCAT(fname, ' ', lname) AS full_name, city, phone, 
            timestampdiff(YEAR, DATE(birth_date), CURDATE()) AS age, DATE(applied_date) AS regDate
FROM applicant;";

$sqle .=    "CREATE OR REPLACE VIEW playerBasicInfo AS
SELECT id, CONCAT(fname, ' ',lname) AS `full_name`,
                timestampdiff(YEAR, DATE(birthDate), CURDATE()) AS age , position, prestatus, regDate
FROM player;";





// these 4 query is for the player [total], [Active], [pending], [new players] quickViews
$sqle .=     "SELECT COUNT(*) AS `total`
FROM `playerbasicinfo`;";

$sqle .=    "SELECT COUNT(*) AS `total`
FROM `playerbasicinfo`
WHERE prestatus = 'y';";

$sqle .=     "SELECT COUNT(*) AS `total`
FROM `applicants`;";

$sqle .=    "SELECT COUNT(*) AS `total`
FROM playerbasicinfo
WHERE DATE(regDate) = curdate();";
//above 4 are needed in [players_total.php], [players_active.php], [players_pending.php], [players_new.php]
?>