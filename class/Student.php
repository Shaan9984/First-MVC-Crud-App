<?php

include_once "DBController.php";

class Student
{
	private $db_handle;
    
    function __construct() {
        $this->db_handle = new DBController();
    }



    function deleteStudent($student_id) {
        $query = "DELETE FROM students WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    function getStudentById($student_id) {
        $query = "SELECT * FROM students WHERE id = ?";
        $paramType = "i";
        $paramValue = array(
            $student_id
        );
        
        $result = $this->db_handle->runQuery($query, $paramType, $paramValue);
        return $result;
    }

    function editStudent($fname,$lname,$email, $student_id) {
        $query = "UPDATE students SET fname = ?,lname = ?,email = ? WHERE id = ?";
        $paramType = "sssi";
        $paramValue = array(
            $fname,
            $lname,
            $email,
            $student_id
        );
        
        $this->db_handle->update($query, $paramType, $paramValue);
    }

    // add new Student
    function addStudent($fname,$lname,$email){
    	$query = "INSERT INTO students(fname,lname,email) VALUES(?,?,?)";
    	$paramType = "sss";
    	$paramValue = array(
    		$fname,
    		$lname,
    		$email
    	);
    	$insert = $this->db_handle->insert($query,$paramType,$paramValue);
    	return $insert;
    }
    // get all student
	function getAllStudent(){
		$sql = "SELECT * FROM students";
        $result = $this->db_handle->runBaseQuery($sql);
        return $result;
	}
}
?>