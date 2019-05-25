<?php
session_start();
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
    <link rel="stylesheet" type="text/css" href="home.css" />
    <script src="add_user.js"></script> 
</head>
<body>
<h1>Crypto Currency tracker</h1>

<div id="table">
	<form id="login">
	<h4>Enter Your User ID or Click New User</h4>
	<input id="uid" type="text" name="user_id" placeholder="user_id">
	<input type="button" name="add_user" value="Login" onclick="adduser()">
	</form>
</div>
</body>
</html>