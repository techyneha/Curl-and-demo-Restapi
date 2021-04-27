<?php

class CourseModel{

    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=collegedb","root","password@");
    }

    function create($code, $duration, $title){
    $this->conn->query("INSERT INTO course (CODE, DURATION, TITLE) VALUES('$code', '$duration', '$title')");
    }

    function retreiveAll(): array{
        $res = $this->conn->query("SELECT * FROM course");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function retreiveAllwhere($code):array {

        // $res = $this->conn->query("SELECT * FROM course WHERE CODE = $code");
        $res = $this->conn->prepare("SELECT * FROM course WHERE CODE =:code");
        $res->execute([":code"=> $code]);
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    function update($duration, $title, $code){
        $this->conn->query("UPDATE course SET DURATION = '$duration', TITLE = '$title'  WHERE CODE = $code");
    }

    function deleteAll(){
        $this->conn->query("DELETE FROM course");
    }

    function deleteWhere($code){
        // $this->conn->query("DELETE FROM course WHERE CODE = $code");
        $stmt = $this->conn->prepare("DELETE FROM course WHERE CODE =:code");
        $stmt->execute(array(":code"=> $code));
    }
}



