<?php 

	class Post{
		private $name;

		//All magic methods starts with __(double _)
		//Set function 
		public function __set($name, $value){
			echo "Setting ".$name." to <strong>".$value."</strong><br>";
			$this->name = $value;
		}

		//Get function
		public function __get($name){
			echo "Getting ".$name." <strong>".$this->name."</strong><br>";
		} 

		//isset
		public function __isset($name){
			echo "Is ".$name." set ?<br>";
			return isset($this->name);
		}
	}

	$post = new Post;
	// -> is used to instantiate an object from the class
	$post->name = 'Testing';
	echo $post->name;
	var_dump(isset($post->name));

?>