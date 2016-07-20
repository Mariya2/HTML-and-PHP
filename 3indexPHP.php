<?php
/* Задача 3: Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе
 *  стойност в градуси Celsius C и на трябва да получи градуси Fahrenheit F. 
 *  Използвайте формулата C = ( 5 / 9 ) * (F -32). След това доразширете задачата,
 *  като добавите лист, от който потребителя да сам да избере дали да конвертира
 *  от C към F или от F към C.
 */
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
	
}