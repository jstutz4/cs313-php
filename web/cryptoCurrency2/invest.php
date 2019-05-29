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
<nav>
 <!-- <form class="form-inline"> !-->
	<div id="menujs">
	<input type="button" class="nav-linkjs" onclick="<?php print("home(" . $_SESSION['userID'] . ")" ) ?>" value="View Currency">
	<input type="button" class="nav-linkjs" onclick="invest()" value="View Investments">
    </div>
	<div id="searchjs">
	</div>
</nav>
<div id="table">
	<table>
		<th>Currency</td>
		<th>Price</td>
		<th>Amount Invested</td>
<?php
	include 'connectHeroku.php';

	$table ='<tr>hello</tr>' . $_SESSION['userID'] . 'stop';
	foreach ($db->query('SELECT user_id, name, price, amount FROM amount_invested') as $user_row){
		if($user_row['user_id'] == $_SESSION["userID"]){
			$table = $table . "we made it<br>";
			$table = $table ."<tr><td>". $user_row['name']."</td><td>".$user_row['price']."</td><td>". $user_row['amount']."</td></tr>";
		} 
	}
	print($table)
?>
	</table>
</div>
</body>
</html>