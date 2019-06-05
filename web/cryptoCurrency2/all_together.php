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
	<script src="all_AJAX.js"></script>

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
	<input type="button" value="logout" onclick="logout()">
</div>
<!-- printing reSearch table !-->
<?php
htmlspecialchars(print('
<div id="table">
	<table>
		<th>Currency</th><th>Price</th><th>Volume</th><th>Save</th>
	</table>
</div>
<div id="hiddens"> </div>'));
?>
<div id="searchjs">
	<input type="search" class="form-control mr-sm-2" id="search"  name="currency" placeholder="Currency (ie bitcoin)" aria-label="Search" required>
	<input type="button" value="Filter Currency" onclick=>
	
</div>
<!-- printing view currency table !-->
<?php
include 'connectHeroku.php';
include 'generate_table.php';

//print("session " .$_SESSION['user_name'] . $_SESSION['userID']);
?>
<!-- printing amount invested table !-->
<div id="table">
	<table>
		<th>Currency</td>
		<th>Price</td>
		<th>Amount Invested</td>
		<th>Delete Investment</td>
<?php
	include 'connectHeroku.php';

	$name = $_GET['currency'];

	if(isset($name)){
		foreach ($db->query('SELECT invest_id, user_id, name, price, amount FROM amount_invested') as $user_row){
			if($user_row['user_id'] == $_SESSION["userID"]){
				if($user_row['name'] == $name){
					$table = $table ."<tr><td>". $user_row['name']."</td><td>".$user_row['price']."</td><td>". $user_row['amount'].'</td><td><input type="button" value="delete" name="amount_invested" onclick="deleteRow(\'amount_invested\', ' . $user_row['invest_id'] .')"></td></tr>';
				}
			} 
		}
	}
	elseif(!isset($name)){
		foreach ($db->query('SELECT invest_id, user_id, name, price, amount FROM amount_invested') as $user_row){
			if($user_row['user_id'] == $_SESSION["userID"]){
				$table = $table ."<tr><td>". $user_row['name']."</td><td>".$user_row['price']."</td><td>". $user_row['amount'].'</td><td><input type="button" value="delete" name="amount_invested" onclick="deleteRow(\'amount_invested\', ' . $user_row['invest_id'] .')"></td></tr>';
			} 
		}
	}
	//print($table);
//print("session" . $_SESSION['user_name'] . $_SESSION['userID']);

?>
</table>
</div>
</body>
</html>