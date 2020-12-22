<?php
class SubjectRepository {
	
	function fetch($cond = null) {
		global $conn;
		$sql = "SELECT * FROM subject";
		if ($cond) {
			$sql .=" WHERE $cond";
		} // .= có nghĩa là nối chuỗi
		$subjects = [];
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$subject = new Subject($row["id"], $row["name"], $row["number_of_credit"]);
				$subjects[] = $subject;
			}
		}
		return $subjects;
	}

	function save($data) {
		global $conn;
		$number_of_credit   = $data["number_of_credit"];
		$name       = $data["name"];
		$sql = "INSERT INTO subject (name, number_of_credit)
		VALUES ('$name', '$number_of_credit')";

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
		$subjects = $this->fetch($cond);
		$subject = current($subjects);
		return $subject;
	}

	function update($subject) {
		global $conn;
		$id = $subject->getId();
		$name = $subject->getName();
		$number_of_credit = $subject->getNumberOfCredit();
		//update
		$sql = "UPDATE subject SET name='$name', number_of_credit='$number_of_credit' WHERE id=$id";
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
		$sql = "DELETE FROM subject WHERE id = $id";

		if ($conn->query($sql) === TRUE) {
			return TRUE; 
		}
		echo "Delete thất bại: " . $conn->error;
		return FALSE;
		$conn->close();
	}
}
?> 