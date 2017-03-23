<?php

require_once '/../start/initialize.php';



class File {

	private $directories = [];
	private $content = [];
	public $values = [];


	public function directories() {

		return $this->directories = array_slice(scandir(ROOT. '\memo\images'), 2);

	}

	public function countDirectories() {

		return count($this->directories);

	}


	//set values!
	public function values($directory) {
		$temp;
		$tempArray = [];
	    $tempArray = array_slice(scandir(ROOT. "/memo/images/{$directory}"),2);
	    array_pop($tempArray);
	    for($temp = 1; $temp <= count($tempArray); $temp++){
	    	array_push($this->values, $temp);
	    	array_push($this->values, $temp);
	    }
	    //$temp = count($this->values);
	    return $this->values;
		//var_dump($this->values);

	}

	

	public function setAndName() {

		foreach ($this->directories() as $dir) {
			//echo $dir;
			$this->content[] = explode(".", $dir);
		}
		return $this->content;
	}









}

$file = new File;













?>