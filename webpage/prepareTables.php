<?php 
    
    $sql = "CREATE TABLE IF NOT EXISTS blood_factor(
        id CHAR(1) PRIMARY KEY,
        `type` VARCHAR(8) NOT NULL
    );";

    $sql .= "CREATE TABLE IF NOT EXISTS `player`(
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

$sql .=    "CREATE TABLE IF NOT EXISTS recent_events(
        `id` INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        `ename` VARCHAR(40) NOT NULL,
        `etime` TIMESTAMP  NOT NULL DEFAULT CURRENT_TIMESTAMP);";

$sql .= "CREATE TABLE IF NOT EXISTS scorecard_practise(
        id INT(5) UNSIGNED NOT NULL,
        goals INT(2),
        assist INT(2),
        foul INT(2),
        FOREIGN KEY(id) REFERENCES player(id)
        );";




?>