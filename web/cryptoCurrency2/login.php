<?php
session_start();

$title = htmlspecialchars($_GET['title']);
$showUser = true;
$sorry = substr($title, 0, 4);

if(!isset($title) || $title == "" ){
	$title = 'Enter In Your User Name or Click New User';
else{
	$showUser = false;
	if($sorry == 'sorry'){
			$showUser = true;
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Currency Tracker</title>
	<!--bootstrap 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="onlineCatolog.css">
	!-->
    <link rel="stylesheet" type="text/css" href="home.css"/>
    <script src="login.js"></script>

	<?php
		if(isset($_SESSION['userID'])){
			print('<script type="text/javascript">' . 'autoLogin();' . '</script>');
		}
	?>

</head>
<body>
<h1>Crypto Currency tracker</h1>

<div id="table">
	<form class="login" action="home.php" method="GET">
	<h4 onload="error(this)"><?php print($title)?></h4>
	<input id="uid" type="text" name="user_id" placeholder="user_id" required>
	<input type="submit" name="add_user" value="Login">
	<br>
	<?php
	if($showUser){
		print('<input type="button" name="add_user" value="New User" onclick="adduser()">');
	}
	?>
	</form>
</div>
</body>
</html>