<?php

//unset($GLOBALS);
defined("DB_SERVER") ? null : define("DB_SERVER", "127.0.0.1");
defined("DB_USER") ? null :define("DB_USER", "root");
defined("DB_PASS") ? null :define("DB_PASS", "");
defined("DB_NAME") ? null :define("DB_NAME", "memo");
defined("DB_CHARSET") ? null :define("DB_CHARSET", "utf8");
defined("ROOT") ? null :define( "ROOT", "C:\wamp64\www\php");

$dsn = "mysql:host=".DB_SERVER.";dbname=".DB_NAME.";charset=".DB_CHARSET;

$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
