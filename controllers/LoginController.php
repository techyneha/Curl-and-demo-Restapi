<?php
require("./models/LoginModel.php");

class LoginController {
	private $model;

	public function __construct(){
		$this->model = new LoginModel();
	}

	public function authenticate(){
		$username = $_SERVER["PHP_AUTH_USER"];
		$password = $_SERVER["PHP_AUTH_PW"];

		$isValidUser = $this->model->isValidUser($username, $password);

		return $isValidUser;
	}

	public function logout(){
		session_destroy();
		redirect("/");
	}
}