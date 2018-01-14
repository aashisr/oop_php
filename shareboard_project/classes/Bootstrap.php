<?php

class Bootstrap{
    //Specify properties
    private $controller;
    private $action;
    private $request;

    //Create constructor
    public function __construct($request)
    {
        $this->request = $request;

        //Check for controller
        //If controller is empty, then load home page or home controller
        //else load the requested controller
        if ($this->request['controller'] == ""){
            $this->controller = 'home';
        } else {
            $this->controller = $this->request['controller'];
        }

        //Check for actions
        if ($this->request['action'] == ""){
            $this->action = 'index';
        } else {
            $this->action = $this->request['action'];
        }

        //echo $this->action;
    }

    public function createController(){
        //Check class
        if(class_exists($this->controller)){
            $parents = class_parents($this->controller);
            //Check extend
            if(in_array("Controller", $parents)){
                if(method_exists($this->controller, $this->action)){
                    return new $this->controller($this->action, $this->request);
                } else {
                    //Method does not exist
                    echo '<h1>Method does not exist</h1>';
                    return;
                }
            } else {
                //Base controller does not exist
                echo '<h1>Base controller not found</h1>';
                return;
            }
        } else {
            // controller class does not exist
            echo '<h1>Controller class does not exist</h1>';
            return;
        }
    }
}

?>