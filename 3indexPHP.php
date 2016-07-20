<?php
/* ������ 3: �������� HTML �������� � PHP ������, � ����� ����������� ������ �� ������
 *  �������� � ������� Celsius C � �� ������ �� ������ ������� Fahrenheit F. 
 *  ����������� ��������� C = ( 5 / 9 ) * (F -32). ���� ���� ����������� ��������,
 *  ���� �������� ����, �� ����� ����������� �� ��� �� ������ ���� �� ����������
 *  �� C ��� F ��� �� F ��� C.
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