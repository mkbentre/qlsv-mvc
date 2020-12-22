<?php 
include "../boostrap.php";
$action = !empty($_GET["action"]) ? $_GET["action"] : "list";
// A ? B : C
//toán tử 3 ngôi, nếu A true thì trả về giá trị B, nếu A False thì trả  về giá trị C
switch ($action) {
	case 'list':
		# code...
		$studentRepository = new StudentRepository();
		$students = $studentRepository->fetch();
		//var_dump($students);
		include "../view/student/list.php";
		break;
	case 'add':
		# code...
		include "../view/student/add.php";
		break;
	case 'save':
		$data = $_POST;
		$studentRepository = new StudentRepository();
		if ($studentRepository->save($data)) {
			header("location: StudentController.php");
			exit;
		}
		break;
	case 'edit':
		# code...
		$id = $_GET["id"];
		$studentRepository = new StudentRepository();
		$student = $studentRepository->find($id);
		include "../view/student/edit.php";
		break;
	case 'update':
		$id = $_POST["id"];
		$name = $_POST["name"];
		$birthday = $_POST["birthday"];
		$gender = $_POST["gender"];
		$studentRepository = new StudentRepository();
		$student = $studentRepository->find($id);
		$student->setName($name);
		$student->setBirthday($birthday);
		$student->setGender($gender);
		if ($studentRepository->update($student)) {
			header("location: StudentController.php");
			exit;
		}
		break;
	case 'delete':
		$id = $_GET["id"];
		$studentRepository = new StudentRepository();
		if ($studentRepository->delete($id)) {
			header("location: StudentController.php");
			exit;
		}
		break;
	default:
		echo "404 Not Found";
		break;
}
?>