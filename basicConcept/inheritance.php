<?php  
	
	//Inheritance allows us to create a class and create another class that inherites the properties and methods from first class

	class First{
		public $id = 12;
		protected $name = 'Aashis';

		public function saySomething($word){
			echo $word .'<br>';
		}
	}

	//Anything that is available in first class is available in second class
	class Second extends First{
		public function getName(){
			echo $this->name;
		}
	}

	//Instantiate class Second
	$second = new Second;

	echo $second->getName() . '<br>';
	echo $second->saySomething('Hello ');

?>