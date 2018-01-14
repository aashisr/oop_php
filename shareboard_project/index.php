<!-- Model is basically the data, it handles data.
 View is what the user sees or the interface.
  Controller takes care of directing traffics. -->

<?php
//Start session
session_start();

//Include config
require ('config.php');

require('classes/Messages.php');
require ('classes/Bootstrap.php');
require('classes/Controller.php');
require('classes/Model.php');

require('controllers/home.php');
require('controllers/users.php');
require('controllers/shares.php');

require('models/home.php');
require('models/share.php');
require('models/user.php');

//Constructor in class takes a request which comes in the form of $_GET
$bootstrap = new Bootstrap($_GET);

$controller = $bootstrap->createController();

//Call execute action
//check for controller
if($controller){
    $controller->executeAction();
}

?>