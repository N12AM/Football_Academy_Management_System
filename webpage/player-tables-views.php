<?php

$sqle = "CREATE TABLE IF NOT EXISTS applicant(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(30) NOT NULL,
    lname VARCHAR(30) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    address VARCHAR(100) ,
    city VARCHAR(20),
    street VARCHAR(100),	
    zip INT(5),
    phone VARCHAR(11),
    blood_group CHAR(2),
    rh CHAR(1),
    birth_certificate INT (17) UNIQUE,
    nid VARCHAR(10) UNIQUE,
    gender CHAR(6), 
    birth_date DATE,
    nationality VARCHAR(12),
    `applied_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP);";

$sqle .= "CREATE TABLE IF NOT EXISTS `player`(
	`id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `fname` VARCHAR(50) NOT NULL,
    `lname` VARCHAR(50) NOT NULL,
	`email` VARCHAR(100) NOT NULL,
    `gender` VARCHAR(15) NOT NULL,
    `birthDate` DATE NOT NULL,
    `regDate` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `coach_id` INT(6),
    `position` VARCHAR(30),
    `prestatus` CHAR(1),
    UNIQUE(email),
    FOREIGN KEY(coach_id) REFERENCES coach(id));";

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