<?php

require "Database.php";

class Game {

	private $database;
	private $values; 
	private $cards;
	private $results;
	private $tablebody;

	public function __construct(Database $database) {

		$this->database = $database;

	}

	public function database() {

		return $this->database;

	}

	public function results($table) {

		return $this->results = $this->database->selectAll($table, "ORDER BY score DESC", "LIMIT 10");

	}


	public function setValues($values = []) {

		$this->values = $values;

	}
	//not used
	public function shuffleValues() {

		shuffle($this->values);

	}
	//not used
	public function getValues() {

		return $this->values;

	}

	public function shuffledValues() {

		shuffle($this->values);

		return $this->values;

	}

	public function countValues() {

		return count($this->values)/2;

	}

	public function board($values, $picturesSet) {
		$class;

		switch (count($values)) {
			case 32:
				$class = "cards32";
				
				break;
			case 16:
				$class = "cards16";
				break;
			
			default:
				$class = "cards8";
				break;
		}


		for($i=0; $i<count($values); $i++ ) {

		$this->cards .= "<div class='cards ".  $class ."' data='" .$values[$i] . "'>";
		$this->cards .= "<img class='cardsImages' src='images/$picturesSet/$values[$i]'.png>";
		$this->cards .= "<img class='frontImage' src='images/$picturesSet/front.png'></div>";
		
		}

		return $this->cards;
	}

	public function checkDifference($quantity, $matches) {
		if($quantity - $matches > 1) {
			return true;
		}
		else{
			return false;
			}
	}

	public function drawTable($table) {

	$rank = 1;
	$date;
	$tableBody = '';

	foreach ($this->results($table) as $result) {
		$date = date('d F Y | H:m', strtotime($result['date']));
		$tableBody .= "<tr><td>". $rank ."</td><td>". $result["name"] ."</td><td>". $result["score"] ."</td><td>".$date."</td></tr>";
		$rank++;
	}
	return $tableBody;

	}

}



$database = new Database;
$game = new Game($database);