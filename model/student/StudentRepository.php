<?php
class StudentRepository {
	
	function fetch($cond = null) {
		global $conn;
		$sql = "SELECT * FROM student";
		if ($cond) {
			$sql .=" WHERE $cond";
		} // .= có nghĩa là nối chuỗi
		$students = [];
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$student = new Student($row["id"], $row["name"], $row["birthday"], $row["gender"]);
				$students[] = $student;
			}
		}
		return $students;
	}

	function save($data) {
		global $conn;
		$birthday   = $data["birthday"];
		$name       = $data["name"];
		$gender     = $data["gender"];
		$sql = "INSERT INTO student (name, birthday, gender)
		VALUES ('$name', '$birthday', $gender)";

		if ($conn->query($sql) === TRUE) {
		    // $last_id = $conn->insert_id;//chỉ cho auto increment
			return TRUE;
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
			return FALSE;
		}
	}

	function find($id) {
		$cond = "id = $id";
		$students = $this->fetch($cond);
		$student = current($students);
		return $student;
	}

	function update($student) {
		global $conn;
		$id = $student->getId();
		$name = $student->getName();
		$birthday = $student->getBirthday();
		$gender = $student->getGender();
		//update
		$sql = "UPDATE student SET name='$name', birthday='$birthday', gender=$gender WHERE id=$id";
		if ($conn->query($sql) === TRUE) {
			return TRUE;
		} else {
			echo "Update thất bại: " . $conn->error;
			return FALSE;
		}
		$conn->close();
	}

	function delete($id) {
		global $conn;
		$id = $_GET["id"];
		$sql = "DELETE FROM student WHERE id = $id";

		if ($conn->query($sql) === TRUE) {
			return TRUE; 
		}
		echo "Delete thất bại: " . $conn->error;
		return FALSE;
		$conn->close();
	}
}
?>