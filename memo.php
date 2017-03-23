<?php

require_once "classes/Game.php";
require_once "classes/File.php";


//$cards = "";

$buttonsSet = "";

//insert main into the views because tables are different

foreach ($file->setAndName() as $content) {
	
	$buttonsSet .= "<button value='".$content[0]."'>".$content[1]."</button>";

}





require "views/memo.view.php";

?>
