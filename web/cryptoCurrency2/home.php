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

<nav>
 <!-- <form class="form-inline"> !-->
	<div id="menujs">
	<input type="button" class="nav-linkjs" onclick="<?php print("showCurrency(" . $_SESSION['userID'] . ")" ) ?>" value="View Currency">
	<input type="button" class="nav-linkjs" onclick="<?php print("invest()") ?>" value="View Investments">
    </div>
	<div id="searchjs">
	<input class="form-control mr-sm-2" id="search" type="search" placeholder="Currency (ie bitcoin)" aria-label="Search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="button" onclick="searchName()">Filter Currency</button>
	</div>
</nav>
<body>
<h1>Crypto Currency tracker</h1>

<div id="table">
<?php
include 'connectHeroku.php';
include 'generate_table.php';
?>
</div>
</body>
</html>