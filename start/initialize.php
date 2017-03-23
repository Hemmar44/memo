<?php

//unset($GLOBALS);
defined("DB_SERVER") ? null : define("DB_SERVER", "127.0.0.1");
defined("DB_USER") ? null :define("DB_USER", "root");
defined("DB_PASS") ? null :define("DB_PASS", "");
defined("DB_NAME") ? null :define("DB_NAME", "memo");
defined("DB_CHARSET") ? null :define("DB_CHARSET", "utf8");
defined("ROOT") ? null :define( "ROOT", "C:\wamp64\www");

$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=".DB_CHARSET;

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

//sql 
/*
CREATE TABLE `challenge` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` TINYTEXT NOT NULL COLLATE 'utf8_polish_ci',
	`score` INT(11) NOT NULL,
	`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_polish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=9
; 

CREATE TABLE `memo` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` TINYTEXT NOT NULL COLLATE 'utf8_polish_ci',
	`score` INT(11) NOT NULL,
	`date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_polish_ci'
ENGINE=MyISAM
AUTO_INCREMENT=40
; 

*/
