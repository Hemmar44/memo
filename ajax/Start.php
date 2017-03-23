<?php

require_once "/../classes/Game.php";
require_once "/../classes/File.php";


//echo gettype($_POST["start"]);

$set = "set".$_POST["counter"];
$folder; 


foreach($file->directories() as $key => $dir) {
	if (strpos($dir, $set) !== false) {
    $folder = $dir;
	}
}

$game->setValues($file->values($folder));

echo $game->board($game->shuffledValues(), $folder). "||" . $game->countValues(). "||" . $file->countDirectories();





?>
