<?php
require_once("./controllers/CollegeController.php");
require_once("./controllers/CourseController.php");
require_once("./controllers/LoginController.php");
$resourceString = $_GET["resourceString"];


// $usernamee = $_SERVER["PHP_AUTH_USER"];
// $password = $_SERVER["PHP_AUTH_PW"];
// echo $username;
// echo $password;

$loginController = new LoginController();
$isValidUser = $loginController->authenticate();
if(!$isValidUser){
	echo json_encode(array("status" => "failure"));	
	die();
}


list($className, $paramsString) = explode("?", $resourceString);
//echo $className." ".$paramsString;

list($_, $params) = explode("=", $paramsString);

$paramsArr = explode("/", $params);
// echo "<pre>";
// print_r($paramsArr);
// echo "</pre>";

$ctrlObj = new $className();
$method = $_SERVER["REQUEST_METHOD"];
//echo $method;

call_user_func_array(array($ctrlObj, $method),$paramsArr);