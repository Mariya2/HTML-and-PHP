<!-- Задача 1: 
Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе 2 числа и да избере от лист
каква операция иска да изпълни. След това изведете резултата от неговия избор и въведени стойности.
Възможни операции нека да бъдат +, - , *, /. Направете всички възможни проверки за въведените стойности.
 -->
<?php 
 /* $_GET = [
 		'first_num' => 7,
 		'second_num' => 8,
 		'operation' => 'sum'
 ]; */
 
$result = "";
$errors = [];
if(!empty($_GET)) {
	$firstNum = isset($_GET['first_num']) ? htmlentities($_GET['first_num']) : "";
	
	$secondNum = isset($_GET['second_num']) ? htmlentities($_GET['second_num']) : "";
	$operation = htmlentities($_GET["operation"]);
	if ((empty($firstNum)&&($firstNum!= 0)) || empty($secondNum)&&($secondNum!= 0)) {
		
		$errors []= "Попълнете полетата";
	}
	if (!is_numeric($firstNum) || !is_numeric($secondNum)) {
	
		$errors []= 'Въведете число';
	}
	if ($operation == "divide" && ($firstNum == 0 || $secondNum == 0)) {
		$errors []= "Попълнете число, различно от 0";
	}
	
	if (!$errors) {
		
		if ($operation == "sum") {
			$result = $firstNum + $secondNum;
		}
		if ($operation == "sub") {
			$result = $firstNum - $secondNum;
		}
		if ($operation == "multiply") {
			$result = $firstNum*$secondNum;
		}
		if ($operation == "divide" && $firstNum != 0 && $secondNum != 0) {
			$result = $firstNum/$secondNum;
		}
		
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>1 задача</title>
</head>
<style type="text/css">
	form {
	margin: 0 auto;
	width: 70%;
	padding: 5px 7px;
	}
	label{
		padding: 5px;
		display: block;
	}
	input, select {
	padding: 3px;
	margin-bottom: 10px;
	border-radius: 3px;
	}
	p {
		padding: 5px;
		color: red;
		font-size: 1.3em;
	}
	button {
		padding: 5px;
		margin: 5px;
		border: 2px inset darkgray;
		border-radius: 3px;
	}
</style>
<body>
	<form method="get" action="1zad.php">
			<?php foreach ($errors as $error):?>
			<p id="errors"><?= $error; ?></p>
			<?php endforeach;?>
		<div>
			<label for="first_num">Въведете първото число</label>
			<input type="number" name="first_num" id="first_num" value="<?= htmlentities(empty($_GET["first_num"]) ? '' : $_GET["first_num"]);?>"/>
		</div>
		<div>
			<label for="second_num">Въведете второто число</label>
			<input type="number" name="second_num" id="second_num" value="<?= htmlentities(empty($_GET["second_num"]) ? '' : $_GET["first_num"]);?>"/>
		</div>
		<div>
			<label for="select_operation">Изберете операция</label>
			<select id="select_operation" name="operation">
				<option value="sum" selected="selected"><a href="&operation=sum"> Събиране (+) </a><option>
				<option value="sub"><a href="&operation=sub"> Изваждане (-) </a><option>
				<option value="multiply"><a href="&operation=multiply"> Умножение (*) </a><option>
				<option value="divide"><a href="&operation=divide"> Деление (/) </a><option>
			</select>
		</div>
		<div>
			<button type="submit">Изчисли</button> 
			<p id="result"><?= sprintf('%05.2f', $result); ?></p>
		</div>
	</form>
</body>
</html>