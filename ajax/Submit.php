<?php

require_once "/../classes/Game.php";

$name = htmlentities($_POST["name"]);
$score = $_POST["score"];
$table = $_POST["table"];
$message;

//print_r($_POST);
if(strlen($name) < 3 || strlen($name) > 20) {
	$message = "<p class='danger'>Name must have no less then 3 and no more than 20 characters</p>";
	echo $game->drawTable($table). "||" . $message . "||" . "error";
}
else {
	if($game->database()->insert($table, [
		"name" => $name,
		"score" => $score
		])) {
		$message = "<p class='success'>Your score has been successfully submitted</p>";
		echo $game->drawTable($table)."||". $message;

	}
	else {

		$message = "<p class='danger'>Maintenance in progres, please try again later</p>";

	}


}




?>