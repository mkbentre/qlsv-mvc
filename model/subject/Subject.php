<?php 
class Subject {
	protected $id;
	protected $name;
	protected $number_of_credit;
	function __construct($id, $name, $number_of_credit) {
		$this->id = $id;
		$this->name = $name;
		$this->number_of_credit = $number_of_credit;
	}

	function getId() {
		return $this->id;
	}

	function getName() {
		return $this->name;
	}

	function getNumberOfCredit() {
		return $this->number_of_credit;
	}
	
	function setName($name) {
		$this->name = $name;
	}

	function setNumberOfCredit($number_of_credit) {
		$this->number_of_credit = $number_of_credit;
	}
}
?>