<?php
/* Задача 3: Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе
 * стойност в градуси Celsius C и на трябва да получи градуси Fahrenheit F. 
 * Използвайте формулата C = ( 5 / 9 ) * (F -32). След това доразширете задачата, 
 * като добавите лист, от който потребителя да сам да избере дали да конвертира от 
 * C към F или от F към C. */
$num = "";
$celsius = "";
$fahrenheit = "";

$errors = [];

if(!empty($_GET)) {
	$num = isset($_GET['num']) ? $_GET['num'] : "";
	
	if (empty($num)) {
		$num = 0;
	} elseif (!is_numeric($num)) {
		$errors [] = "The field value must be numeric.";
	} 
	if ($_GET["check"] == "c") {
		$celsius = $num;
		$fahrenheit = $num / (5 / 9) + 32;
	}
	if ($_GET["check"] == "f") {
		$fahrenheit = $num; 
		$celsius = (5 / 9) * ($num - 32);
	}
	
}?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
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
	#errors {
		padding: 5px;
		color: red;
	}
	.result {
		padding: 5px;
		color: blue;
	}
	button {
		padding: 5px;
		margin: 5px;
		border: 2px inset darkgray;
		border-radius: 3px;
	}
</style>
<body>
	<form method="get" action="3zad.php">
		<div>
			<label for="num">Enter value</label>
			<input type="text" name="num" id="num" value="<?= htmlentities(empty($_GET["num"]) ? '': $_GET["num"]);?>"/>
		</div>
		<div>
			<select name="check">
				<option  value="c"><a href="&check=c"> C to F</a></option>
				<option  value="f"><a href="&check=f"> F to C</a></option>
			</select>
		</div>
		<div>
			<button type="submit">Calculate</button> 
			<?php foreach ($errors as $error):?>
			<p id="errors"><?php echo $error; ?></p>
			<?php endforeach;?>
			<?php if ($_GET["check"]=="c"):?>
			<p id="result">
			<?= "$celsius Celsius degrees correspond to $fahrenheit Fahrenheit degrees."; ?></p>
			<?php else:?>
			<p id="result">
			<?= "$fahrenheit Fahrenheit degrees correspond to $celsius Celsius degrees "; ?></p>
			<?php endif;?>
		</div>
	</form>
</body>
</html>