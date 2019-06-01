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
	<link rel="stylesheet" type="text/css" href="research.css"/>
    <script src="dataBase.js"></script>
	<script src="get_currency.js"></script>
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
		<form>
</nav>
<h4>Start looking up your favourite crypto currency by entering its symbol</h4>
<div id="searchjs">
	<input type="search" class="dimension" id="search"  name="currency" placeholder="(ie BTC, LTC, BCH, ETH)" aria-label="Search">
	<input class="dimension" type="button" value="Get Currency" onclick="getCurrency()">
</div>
<?php
htmlspecialchars(print('
<div id="table">
	<table>
		<th>Currency</th><th>Price</th><th>Volume</th><th>Save</th>
	</table>
</div>
<div id="hiddens"> </div>'));

print("session " .$_SESSION['user_name'] . $_SESSION['userID']);
?>
</body>
</html>