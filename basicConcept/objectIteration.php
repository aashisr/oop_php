<?php

    class People{
        public $person1 = 'Mike';
        public $person2 = 'Shelly';
        public $person3 = 'Aashis';

        //Not able to access outside of this class
        protected $person4 = 'John';
        private $person5 = 'Jen';

        //Create a method to iterate object
        //Here, key is person1,2 .. and value is name
        /* //This function gives all five persons
        function iterateObject(){
            foreach ($this as $key => $value){
                print "$key => $value\n";
            }
        }
        */
    }

    $people = new People;

    //protected and private are not allowed to be accessed by this
    foreach ($people as $key => $value){
        print "$key => $value\n";
    }

    //protected and private are allowed to be accessed by this
    //$people->iterateObject();

?>