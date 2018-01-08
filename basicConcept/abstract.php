<?php  

	//Abstract class is a base class
	//Not lot used in PHP
	//Can not instantiate abstract class
	//Made to have other classes extend from and use methods and properties inside abstract class
    //IF one function is abstract, then the class must be abstract

	abstract class Animal{
		public $name;
		public $color;

		public function describe(){
		    return $this->name . ' is ' .$this->color;
        }

        abstract public function makeSound();
	}

	class Duck extends Animal{
        public function describe()
        {
            return parent::describe(); // TODO: Change the autogenerated stub
        }

        public function makeSound()
        {
            return 'Quack'; // TODO: Implement makeSound() method.
        }
    }

    class Dog extends Animal
    {
        public function describe()
        {
            return parent::describe(); // TODO: Change the autogenerated stub
        }

        public function makeSound()
        {
            return 'Bark'; // TODO: Implement makeSound() method.
        }
    }

    //Cant instantiate abstract class
    //So, instantiate Duck class
    $animal = new Duck();
	$animal->name = 'Ben';
	$animal->color = 'Blue';

	echo $animal->describe(). '<br>';
	echo $animal->makeSound(). '<br>';

	//Instantiate Dog class
    $animal = new Dog();
    $animal->name = 'Ben';
    $animal->color = 'Blue';

    echo $animal->describe() . '<br>';
    echo $animal->makeSound() . '<br>';

?>