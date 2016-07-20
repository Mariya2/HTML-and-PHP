<?php
/* Задача 2:
Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе username
 и 2 пароли. Проверете дали двете пароли съвпадат и след това ги криптирайте. 
 Изпишете след това username и криптираната парола. Направете всички възможни 
 проверки за въведените стойности.
 */
$cryptPass1 = "";
$cryptPass2 = "";
$pass1 = "kfjdl;ak";
$pass2 = "kfjdl;ak";
$salt = "jf";
$cryptPass1 = crypt($pass1, $salt);
$cryptPass2 = crypt($pass2, $salt);

$errors = [];

if(!empty($_POST)) {
	$username = isset($_POST['username']) ? $_POST['username'] : "";
	$pass1 = isset($_POST['pass1']) ? $_POST['pass1'] : "";
	$pass2 = isset($_POST['pass2']) ? $_POST['pass2'] : "";
	
	if (empty($username) || empty($pass1) || empty($pass2)) {
		$errors[] = "All fields are mandatory.";
	}
	
	if (strlen($username) < 3) {
		$errors[] = 'Username have to be longer than 3 chars';
	}
	
	if (strlen($pass1) < 3) {
		$errors[] = 'Password have to be longer than 3 chars';
	}
	
	if (strcmp($pass1, $pass2) !== 0){
		$errors[] = 'Uncorect password';
	} else {
		$cryptPass1 = crypt($pass1, $salt);
		$cryptPass2 = crypt($pass2, $salt);
	}
	
}