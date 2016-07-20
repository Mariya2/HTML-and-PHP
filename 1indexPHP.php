<?php
$result = "";
$errors = [];
print_r($_GET);
if(!empty($_GET)) {
	$firstNum = isset($_GET['first_num']) ? $_GET['first_num'] : "";
	$secondNum = isset($_GET['second_num']) ? $_GET['second_num'] : "";
	if (empty($firstNum) || empty($secondNum)) {
		$errors[] = "Всички полета трябва да са попълнени!";
	}
	if (!is_numeric($firstNum) || !is_numeric($secondNum)) {
		$errors[] = 'Въведената стойност трябва да бъде число';
	}
	$operation = $_GET["operation"];
	if (!$errors) {
		if($operation == "sum" ){
			$result = $firstNum + $secondNum;
		}
		if($operation == "sub" ){
			$result = $firstNum - $secondNum;
		}
		if($operation == "multiply"){
			$result = $firstNum*$secondNum;
		}
		if($operation == "multiply" && $firstNum != 0 && $secondNum != 0){
			$result = $firstNum/$secondNum;
		}
	}
}
