<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Currency Tracker</title>
    <!--<link rel="stylesheet" type="text/css" href="home.css" /> !-->
    <script src="add_user.js"></script> 
</head>
<body>
<p>crypto Currency tracker</p>
	<div id="table">
		<form>
		<h4>Enter Your User ID or Click New User</h4>
		<input id="u_id" type="text" name="user_id" placeholder="user_id">
		<input type="button" name="add_user" value="New User" onclick="adduser()">
		</form>
	</div>
</body>
</html>