<?php  
	//Classes are not static, it is the methods and properties inside it
	class User {
		//minimum password length is always going to be same for all users, so it is static
		public static $minPassLength = 5;

		public static function validatePassword($password){
			//$this is not used in static methods
			//here it was $this->minPassLength for dynamic function
			//:: is scope resolution operator
			if (strlen($password) >= self::$minPassLength) {
				return true;
			} else {
				return false;
			}
		}
	}

	$password = 'password';

	//To check id password is valid
	//No need to instantiate the class for statuc methods
	if (User::validatePassword($password)) {
		echo 'Password is valid <br>';
	} else {
		echo 'Password is not valid <br>';
	}

	//No instantiation for class User
	echo User::$minPassLength;

?>