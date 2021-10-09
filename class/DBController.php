<?php

class DBController{

	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "test";
	private $conn;

	function __construct(){
		$this->conn = $this->connectDB();
	}

	function connectDB(){
		$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	// insert data in student
	function insert($query,$paramType,$paramValue){
		$sql = $this->conn->prepare($query);
		$this->bindQueryParams($sql,$paramType,$paramValue);
		$sql->execute();
		$insert = $sql;
		return $insert;

	}

	function update($query, $paramType, $paramValue) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql,$paramType, $paramValue);
        $sql->execute();
    }
	// set to insert value in database
	function bindQueryParams($sql, $paramType, $paramValue) {
        $param_value_reference[] = & $paramType;
        for($i=0; $i<count($paramValue); $i++) {
            $param_value_reference[] = & $paramValue[$i];
        }
        call_user_func_array(array(
            $sql,
            'bind_param'
        ), $param_value_reference);
    }

    function runQuery($query, $paramType, $paramValue) {
        $sql = $this->conn->prepare($query);
        $this->bindQueryParams($sql, $paramType, $paramValue);
        $sql->execute();
        $result = $sql->get_result();
        
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if(!empty($resultset)) {
            return $resultset;
        }
    }

    // get all students
	function runBaseQuery($query) {
        $result = $this->conn->query($query);   
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }
}

?>