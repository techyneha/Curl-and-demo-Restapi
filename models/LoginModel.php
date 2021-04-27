<?php
class LoginModel {

	private $conn;

	public function __construct(){

		$this->conn = new PDO("mysql:host=localhost;dbname=collegedb","root","password@");
	}

	public function isValidUser($username, $password){

		//' or 1=1; sql injection testing // ' or 1 order by id desc;#'

		// $stmt = $this->conn->query("select * from login where username='".$username."' and password='".$password."'");
		$stmt = $this->conn->prepare("select * from login where username=:username and password=:password");
		$stmt->execute(array(":username"=> $username, ":password" => $password));

		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		
		return $result ? $result["username"] : false;
	}
}

