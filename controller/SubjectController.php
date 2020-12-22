<?php 
include "../boostrap.php";
$action = !empty($_GET["action"]) ? $_GET["action"] : "list";
// A ? B : C
//toán tử 3 ngôi, nếu A true thì trả về giá trị B, nếu A False thì trả  về giá trị C
switch ($action) {
	case 'list':
		# code...
		$subjectRepository = new SubjectRepository();
		$subjects = $subjectRepository->fetch();
		//var_dump($subjects);
		include "../view/subject/list.php";
		break;
	case 'add':
		# code...
		include "../view/subject/add.php";
		break;
	case 'save':
		$data = $_POST;
		$subjectRepository = new SubjectRepository();
		if ($subjectRepository->save($data)) {
			header("location: SubjectController.php");
			exit;
		}
		break;
	case 'edit':
		# code...
		$id = $_GET["id"];
		$subjectRepository = new SubjectRepository();
		$subject = $subjectRepository->find($id);
		include "../view/subject/edit.php";
		break;
	case 'update':
		$id = $_POST["id"];
		$name = $_POST["name"];
		$number_of_credit = $_POST["number_of_credit"];
		$subjectRepository = new SubjectRepository();
		$subject = $subjectRepository->find($id);
		$subject->setName($name);
		$subject->setNumberOfCredit($number_of_credit);
		if ($subjectRepository->update($subject)) {
			header("location: SubjectController.php");
			exit;
		}
		break;
	case 'delete':
		$id = $_GET["id"];
		$subjectRepository = new SubjectRepository();
		if ($subjectRepository->delete($id)) {
			header("location: SubjectController.php");
			exit;
		}
		break;
	default:
		echo "404 Not Found";
		break;
}
?>