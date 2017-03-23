<?php

namespace Memo;

class Session {

	public static function redirectTo($location){

		header("Location: $location");

	}

	
}