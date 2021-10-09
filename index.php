<?php
require_once ("class/DBController.php");
require_once ("class/Student.php");

$db_handle = new DBController();

//take action 
$action = "";
if (! empty($_GET["action"])) {
    $action = $_GET["action"];
}

switch ($action) {
	case 'student-add':
		if(isset($_POST['add'])){
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$email = $_POST['email'];

			$student = new Student();
			$insertId = $student->addStudent($fname,$lname,$email);
			if(empty($insertId)){
				$response = array("message"=>"Problem in adding Record.","Type"=>"error");
			}
			else{
				header('Location:index.php');
			}
		}


		require_once "web/student-add.php";
		break;

	case 'student-delete':

		$student_id = $_GET['id'];
		$student = new Student();
		$student->deleteStudent($student_id);
        
        $result = $student->getAllStudent();
        require_once "web/student.php";
        break;

    case "student-edit":
        $student_id = $_GET["id"];
        $student = new Student();
        
        if (isset($_POST['update'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            
            $student->editStudent($fname,$lname,$email,$student_id);
            
            header("Location: index.php");
        }
        
        $result = $student->getStudentById($student_id);
        require_once "web/student-edit.php";
        break;
	default:
		$student = new Student();
		$result = $student->getAllStudent();
		require_once "web/student.php";
		break;
}
?>