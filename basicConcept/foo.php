<?php

    //Final makes sure that this class function can no longer be overridden by any child classes
    //Helpful when working with multiple developers
    final class Foo{
        public function sayHello(){
            echo 'Hello World';
        }
    }

?>