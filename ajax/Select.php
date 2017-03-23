<?php

require_once "/../classes/Game.php";
require_once "/../classes/File.php";
//$set = $_POST["set"];
//$name = $_POST["name"];

$folder = implode(".", $_POST);



$game->setValues($file->values($folder));

//var_dump($game->countValues());

//needs values where to get them from!!?? ::)

echo $game->board($game->shuffledValues(), $folder). "||" . $game->countValues() ;












?>