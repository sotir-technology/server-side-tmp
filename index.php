<?php
header("Content-Type: application/json");
session_start();
//require config
require __DIR__ . '/config.php';
if(APP_HIDE_ERROR){
    error_reporting(0); //silence every error
}
//import routing engines
require __DIR__ . '/flatroad/autoload.php';
//require db
require __DIR__.'/includes/loader.php';

// Require composer autoloader
use Flatroad\Router\Router;

// Create Router instance
$router = new Router();
//set base name
//$router->setBasePath("/");
// Define routes
// ....
//defining errors
$router->set404(function () {
    echo "Make use of /api";
});

//default home
$router->all("/", function (){
   echo "FlatRoad Api engine is running fine, use /api to start coding...";
});

// Run it!
$router->run();

//render functions
function renderView($viewName){
    return (__DIR__.'/views/'.$viewName.'.php');
}
?>
