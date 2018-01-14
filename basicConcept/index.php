<?php
//Object Operator (->) is used in object scope to access methods and properties of objects
//Double arrow operator (=>) is used as an access mechanism for arrays.

	/**
	* 
	*/
	class User
	{
		//Setting up properties or attribrutes
		//public, private, protected are just variable declarations like local or global variables
		public $id;
		public $username;
		public $email;
		public $password;


		//No need to call this function, used for setting default properties
		//these functions below are methods
		public function __construct($username, $password){
			$this->username = $username;
			$this->password = $password;
		}

		public function register(){
			echo 'User registered <br>';
		}

		public function login(){
			//echo $username. ' is now logged in. <br>';

			//call auth_user here
			//$this is used to access any method or properties
			
			$this->auth_user();
		}

		//Call method from inside of another method
		public function auth_user(){
			echo $this->username. ' is now authenticated. <br>';
		}

		//Used for closing database connections or any other things that needs to be run at last
		public function __destruct(){
			echo "Destructor called. <br>";
		}

	}

	//Instantiate a class, variable $User can be used to call method and properties
	$User = new User('aashis', 'rimal');

	echo $User->username."<br>";

	$User->register();

	$User->login();


?>