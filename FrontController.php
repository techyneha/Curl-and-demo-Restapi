<?php 
require("./controllers/TestController.php");
require("./controllers/CollegeController.php");
require("./controllers/CourseController.php");
require("./controllers/HomeController.php");
require("./controllers/LoginController.php");
require("./controllers/PublicController.php");
require("./routes.php");
require("./lib/utils.php");

class FrontController {

	private const LOGIN_KEY = "LOGIN_KEY";

	public function processRoute() {
		global $routes;
		$url = $_GET["route"];

		$resourcesRoute = $this->mappedRoute($routes,$url);

		//if no mapping is found
		if(!$resourcesRoute) {
			require("./views/not_found.php");
			die();
		}

		$isPublicRoute = $this->isPublicRoute($resourcesRoute);
		//$loggedInUser = $this->loggedInUser();

		//public routes
		if($isPublicRoute){
			$this->executeRoute($resourcesRoute);
			return;
		}

		$this->validateCsrf();

		//private route: check wheather user already logged in
		if(!$this->loggedInUser()) {
			$validUser = $this->authenticateRequest();
			//not a valid user
			if(!$validUser) { 
				$this->displayLoginFailedPage();
				die();
			} else {
				$this->updateLoggedInUser($validUser);
			}
		}

		// if loggedIn user is null
		// if(!$isPublicRoute  && !$this->loggedInUser()) {
		// 	$validUser = $this->authenticateRequest();
		// 	if(!$validUser) {
		// 		$queryString = $_SERVER["QUERY_STRING"];
		// 		$qString = str_replace("route=", "", $queryString);
		// 		require("./views/login_failure.php");
		// 		die();
		// 	}

		// 	$this->updateLoggedInUser($validUser);
		// }

		$this->executeRoute($resourcesRoute);

	}

	private function validateCsrf(){
		if(isset($_SESSION["_token"])){
			if(isForgeRequest()){
				echo "invalid csrf token";
				die();
			}
		}

		$_SESSION["_token"] = bin2hex(random_bytes(16));
	}

	private function isForgeRequest(){
		//search for token in post and then in get
		$isValidToken = true;

		$csrfTokenFromRq = isset($_POST["_token"]) ? $_POST["_token"] : (isset($_GET["_token"]) ? $_GET["_token"] : null);

		$csrfTokenFromRq = isset($_POST["_token"]) ? $_SESSION["_token"] : null;

		echo "csrf request : ".$csrfTokenFromRq.PHP_EOL;
		echo "csrf session : ".$csrfTokenFromSession.PHP_EOL;
		if($csrfTokenFromRq === null || $csrfTokenFromSession === null){
			echo "Tokens are null".PHP_EOL;
			$isValidToken = false;
		}
		if($csrfTokenFromSession === $csrfTokenFromRq){
			$isValidToken = true;
			echo "Valid csrf token".PHP_EOL;
		}
		return !$isValidToken;
	}

	private function displayLoginFailedPage(){
		$queryString = $_SERVER["QUERY_STRING"];
		$qString = str_replace("route=", "", $queryString);
		require("./views/login_failure.php");
	}

	private function mappedRoute($routes, $url){
		$url = ($url === "") ? "base" : $url;
		$mappedString = $routes[$url];

		return ($mappedString ? $mappedString : null);
	}

	private function loggedInUser(){
		session_start();
		return isset($_SESSION[self::LOGIN_KEY]) ? true : false;
	}

	private function authenticateRequest(){
		$loginController = new LoginController();
		$validUser = $loginController->authenticate();
		return $validUser ? true : false;
	}

	private function updateLoggedInUser($loginValue){
		$_SESSION[self::LOGIN_KEY] = $loginValue;
	}

	private function executeRoute($resourcesRoute){
		$parts = explode("/", $resourcesRoute);
		$className = $parts[0];
		$methodName = $parts[1];
		$ctrlObj = new $className();
		$ctrlObj->{$methodName}();
	}

	private function isPublicRoute($resourcesRoute): bool {
		$parts = explode("/", $resourcesRoute);
		$className = $parts[0];

		return ($className === "PublicController" ? true : false);
	}
}

$frontController = new FrontController();
$frontController->processRoute();

