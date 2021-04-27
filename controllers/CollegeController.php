<?php
require_once("./models/college/CollegeModel.php");

class CollegeController{

	public function __construct(){
		$this->collegeModel = new CollegeModel();
	}

	private function getOne($id){
		return $this->collegeModel->retreiveAllwhere($id);
	}

	public function get($id = null){
		if(!$id){
			$rows = $this->collegeModel->retreiveAll();
		}else {
			$rows = $this->getOne($id);
		}
		
		echo json_encode($rows);
	}

	public function post(){
		$jsonRequestString = file_get_contents("php://input"); 
		$reqObj = json_decode($jsonRequestString);
		$newName = $reqObj->college_name;
		$newAddress = $reqObj->college_address;
		$newPhone = $reqObj->college_phone;

		$id = rand(100,1000)."";

		$this->collegeModel->create($id, $newName, $newAddress, $newPhone);
	}

	public function put($id){
		echo "Updating . . . ";
		$jsonRequestString = file_get_contents("php://input");
		$reqObj = json_decode($jsonRequestString);
		$newName = $reqObj->college_name;
		$newAddress = $reqObj->college_address;
		$newPhone = $reqObj->college_phone;

		$this->collegeModel->update($newName, $newAddress, $newPhone, $id);
	}

	public function delete($id){
		echo $id;
		$this->collegeModel->deleteWhere($id);
	}
}


//$action = $_GET["action"];
//echo $action;

// $collegeCtrl = new CollegeController();
// $collegeCtrl->{$action}();
