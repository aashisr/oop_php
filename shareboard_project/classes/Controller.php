<?php

//Create an abstract controller class because we don't need to instantiate it itself, rather other controllers extend from it
abstract class Controller{
    //protected properties so that other classes that extend from this one can access them
    protected $request;
    protected $action;

    public function __construct($action, $request){
        //Assign properties
        $this->action = $action;
        $this->request = $request;
    }

    public function executeAction(){
       return $this->{$this->action}();
    }

    //Return view, assign view to controllers
    protected function returnView($viewmodel, $fullview){
        //For view file, gets .php file inside of respective class folder inside views folder
        $view = 'views/'. get_class($this). '/' . $this->action. '.php';

        if($fullview){
            require('views/main.php');
        } else {
            require($view);
        }
    }

}

?>