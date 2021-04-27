<?php
require_once("./models/course/CourseModel.php");

class CourseController{

	public function __construct(){
		$this->courseModel = new CourseModel();
	}

	private function getOne($code){
		return $this->courseModel->retreiveAllwhere($code);
	}

	public function get($code = null){
		if(!$code){
			$rows = $this->courseModel->retreiveAll();
		}else {
			$rows = $this->getOne($code);
		}
		
		echo json_encode($rows);
	}

	public function post(){
		$jsonRequestString = file_get_contents("php://input"); 
		$reqObj = json_decode($jsonRequestString);

		$code = $reqObj->code;
		$duration = $reqObj->duration;
		$title = $reqObj->title;

		$this->courseModel->create($code, $duration, $title);
	}

	public function put($code){
		$jsonRequestString = file_get_contents("php://input"); 
		$reqObj = json_decode($jsonRequestString);

		$duration = $reqObj->duration;
		$title = $reqObj->title;

		$this->courseModel->update($duration, $title, $code);
	}

	public function delete($code){
		echo $code;
		$this->courseModel->deleteWhere($code);
	}
}

//$action = $_GET["action"];
//echo $action;

// $courseCtrl = new CourseController();
// $courseCtrl->{$action}();