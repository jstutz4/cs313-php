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
$_SESSION['user_name'];
$_SESSION['userID'];
$userID;
$table = "<table><th>currency</th><th>price</th><th>volume</th><th>Invest</th>";
//$add_user = "<tr><td>" . $user_row['user_id'] . "</td> <td>" . $user_row['user_name']. "</td>";
$addBTN = '<td><input type="button" value="Invest" name="invest" onclick="invest()"></td>';
$currency = $_GET['currency'];

print('session ' . $_SESSION['userID'] . $_SESSION['user_name'] . $currency);

/*

$stmt = $db->prepare('SELECT user_id, name, price, volume FROM currency WHERE user_id=:id');
$stmt->execute(array(':id' => 123));
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($rows as $currency_row){
	if($currency_row['user_id'] == $userID ){
		$table = $table ."<tr><td>". $currency_row['name']."</td><td>".$currency_row['price']."</td><td>". $currency_row['volume']."</td>".$addBTN."</tr>";
	}
}
*/

if (isset($currency) && $currency != "") {
	//$table = $table . "heres0";
	foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
		if($user_row['user_name'] == $_SESSION["user_name"]){
			//$userID = $user_row['user_id'];
			//$table = $table . "heres1" . $_SESSION["userID"] . $_SESSION["user_name"];
			foreach ($db->query('SELECT user_id, name, price, volume FROM currency') as $currency_row){
				if($currency_row['user_id'] == $_SESSION["userID"] && $currency_row['name'] == $currency){
					$table = $table ."<tr><td>". $currency_row['name']."</td><td>".$currency_row['price']."</td><td>". $currency_row['volume']."</td>".$addBTN."</tr>";
				}
			}
		} 
	}
}
elseif(isset($_SESSION["user_name"]) || isset($_SESSION['userID'])){
	foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
		if($user_row['user_name'] == $_SESSION["user_name"] || $user_row['user_id'] == $_SESSION['userID']){
			$userID = $user_row['user_id'];
			$_SESSION["userID"] = $userID;
			$_SESSION["user_name"] = $_SESSION["user_name"];
			foreach ($db->query('SELECT user_id, name, price, volume FROM currency') as $currency_row){
				if($currency_row['user_id'] == $userID){
					$table = $table ."<tr><td>". $currency_row['name']."</td><td>".$currency_row['price']."</td><td>". $currency_row['volume']."</td>".$addBTN."</tr>";
				}
			}
		} 
	}
}


	print($table . '</table>');

/*
$stmt = $db->prepare('SELECT * FROM table WHERE name=:name');
$stmt->bindValue(':name', $user_name, PDO::PARAM_STR);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
print("<br>look here <br>.$rows");
*/
?>
</div>
</body>
</html>