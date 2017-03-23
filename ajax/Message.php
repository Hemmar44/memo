<?php
require_once "/../classes/Game.php";

$value = $_POST["value"];
$streak = $_POST["streak"];
$score = $_POST["score"];
$matches = $_POST["matches"];
$quantity = $_POST["quantity"];
if (isset($_POST["first"])){
	$first = $_POST["first"];
}
else{
	$first = '';
}

//print_r($_POST);
$message = '';

if($value=="1" && empty($first) && $game->checkDifference($quantity, $matches)) {
	$message = "<p class='danger'>You have uncovered the BAD GUY! watch out in your next move or he will finish your game!</p>";
}

else if($streak > 0 && ($matches !== $quantity)) {
	$message = "<p class='success'>You are on a streak! Your score will grow faster now!</p>";
}

echo $message;







?>