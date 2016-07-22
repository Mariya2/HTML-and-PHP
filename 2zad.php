<!--  Задача 2: 
Създайте HTML страница с PHP скрипт, в който потребителя трябва да въведе username и 2 пароли.
 Проверете дали двете пароли съвпадат и след това ги криптирайте. Изпишете след това username
  и криптираната парола. Направете всички възможни проверки за въведените стойности.
 -->
<?php 
$cryptPass1 = "";
$cryptPass2 = "";
$salt = "jf";
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
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Registration form</title>
</head>
<style type="text/css">
	legend {
	font-size: 1.2em;
	color: gray;
	}
	form {
	margin: 50px auto;
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
		padding: 5px 15px;
		margin: 5px;
		border: 2px inset darkgray;
		border-radius: 3px;
	}
</style>
<body>
	<form method="POST" action="2zad.php">
		<fieldset>
			<legend>Registration form</legend>
			<div>
				<label for="username">Enter username</label>
				<input type="text" name="username" id="username" value="<?= htmlentities(empty($_POST["username"]) ? '': $_POST["username"]);?>"/>
			</div>
			<div>
				<label for="pass1">Enter password</label>
				<input type="password" name="pass1" id="pass1" value="<?= htmlentities(empty($_POST["pass1"]) ? '': $_POST["pass1"]);?>"/>
			</div>
			<div>
				<label for="pass2">Repeat password</label>
				<input type="password" name="pass2" id="pass2" value="<?= htmlentities(empty($_POST["pass2"]) ? '': $_POST["pass2"]);?>"/>
			</div>
			<div>
				<button type="submit">Send</button> 
				<?php foreach ($errors as $error):?>
				<p id="errors"><?php echo $error; ?></p>
				<?php endforeach;?>
				<p class="result">Your username is <?php echo $username; ?>.</p>
				<p class="result">Your password is <?php echo $cryptPass1; ?>.</p>
			</div>
		</fieldset>
	</form>
</body>
</html>