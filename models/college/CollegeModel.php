<?php
class CollegeModel{
    private $conn;

    public function __construct(){
        $this->conn = new PDO("mysql:host=localhost;dbname=collegedb","root","password@");
    }

    function create($cid, $collegename, $collegeaddress, $collegephone){
        $this->conn->query("INSERT INTO colleges (ID, COLLEGE_NAME, COLLEGE_ADDRESS, COLLEGE_PHONE) VALUES('$cid', '$collegename','$collegeaddress','$collegephone')");
    }

    function retreiveAll(): array{
        $res = $this->conn->query("SELECT * FROM colleges");
        return $res->fetchAll(PDO::FETCH_ASSOC);
    }

    function retreiveAllwhere($id):array {
        $res = $this->conn->query("SELECT * FROM colleges WHERE ID = $id ");
        return $res->fetch(PDO::FETCH_ASSOC);
    }

    function update($collegename, $collegeaddress, $collegephone, $whereId){
        $this->conn->query("UPDATE colleges SET COLLEGE_NAME = '$collegename', COLLEGE_ADDRESS = '$collegeaddress', COLLEGE_PHONE =  '$collegephone'  WHERE ID = $whereId");
    }

    function deleteAll(){
        $this->conn->query("DELETE FROM colleges");
    }

    function deleteWhere($cid){
        $this->conn->query("DELETE FROM colleges WHERE ID = $cid");
    }
}
