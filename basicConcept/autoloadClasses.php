<?php

    //include 'foo.php';
    //include 'bar.php';

    //Autoloads all classes so no need to include from other pages
    spl_autoload_register(function ($class_name){
        include $class_name. '.php';
    });

    $foo = new Foo;
    $bar = new Bar;

    $foo->sayHello();
    echo "<br>";
    $bar->sayHi();

?>