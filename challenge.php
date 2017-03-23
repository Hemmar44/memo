<?php


require_once "classes/Game.php";
require_once "classes/File.php";


//$cards = "";
//$tableBody ="";
$buttonsSet = "";


/*
$rank = 1;

foreach ($game->results("challenge") as $result) {
	$date = date('F Y | H:m', strtotime($result['date']));
	$tableBody .= "<tr><td>". $rank ."</td><td>". $result["name"] ."</td><td>". $result["score"] ."</td><td>".$date."</td></tr>";
	$rank++;
}

*/


require "views/challenge.view.php"
?>
