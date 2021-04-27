<?php 
require("./controllers/TestController.php");
require("./controllers/CollegeController.php");
require("./controllers/CourseController.php");
require("./controllers/HomeController.php");
require("./controllers/LoginController.php");
require("./routes.php");
require("./lib/utils.php");

$url = $_GET["route"];
//echo $url."<br>";

if($url === "") {
	//echo "Inside Empty Url"."<br>";
	$url = "base";
}
//echo "Modified Url".$url."<br>"	;
$mappedString = $routes[$url];
if($mappedString  === null){
	require('./views/not_found.php');
	die();
}
//tracking request
session_start();
//echo session_id();
$username = $_SESSION["USER_NAME"];
//echo "username: $username <br>";

if($username === null) {
	$loginController = new LoginController();
	$validUser = $loginController->authenticate();
	//if credential are not valid
	if(!$validUser) {
		require("./views/login_failure.php");
		die();
	}else {
		$_SESSION["USER_NAME"] = $validUser;
	}
}


//echo $mappedString;
$parts = explode("/", $mappedString);
$className = $parts[0];
$methodName = $parts[1];

$ctrlObj = new $className();
$ctrlObj->{$methodName}();
