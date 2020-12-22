<?php 
class Student {
	protected $id;
	protected $name;
	protected $birthday;
	protected $gender;
	function __construct($id, $name, $birthday, $gender) {
		$this->id = $id;
		$this->name = $name;
		$this->birthday = $birthday;
		$this->gender = $gender;
	}

	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}

	function getBirthday() {
		return $this->birthday;
	}

	function getGender() {
		return $this->gender;
	}

	function getGenderName() {
		$genderMap = [0 => "Nam", 1 => "Nữ", 2 => "Khác"];
		return $genderMap[$this->getGender()];
	}
	
	function setName($name) {
		$this->name = $name;
	}

	function setBirthday($birthday) {
		$this->birthday = $birthday;
	}

	function setGender($gender) {
		$this->gender = $gender;
	}
}
?>