<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Currency Tracker | Currency List</title>
	<!--bootstrap 
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="onlineCatolog.css">
	!-->
    <link rel="stylesheet" type="text/css" href="home.css"/>
    <script src="dataBase.js"></script>
<body>
<h1>Crypto Currency tracker</h1>
<nav>
 <!-- <form class="form-inline"> !-->
	<div id="menujs">
		<form action="home.php" method="GET">
			<input type="button" class="nav-linkjs" onclick="reSearch()" value="ReSearch Currency">
			<input type="button" class="nav-linkjs" onclick="home()" value="View Currency">
			<input type="button" class="nav-linkjs" onclick="invester()" value="View Investments">

		</div>
			<div id="searchjs">
				<input type="search" class="form-control mr-sm-2" id="search"  name="currency" placeholder="Currency (ie bitcoin)" aria-label="Search" required>
				<input type="submit" value="Filter Currency">
				<input type="button" value="logout" onclick="logout()">
			</div>
		<form>
</nav>

<div id="table">
<?php
include 'connectHeroku.php';
include 'generate_table.php';
//include 'update_currency.php';

//print("session" . $_SESSION['user_name'] . $_SESSION['userID']);
?>
</div>
</body>
</html>