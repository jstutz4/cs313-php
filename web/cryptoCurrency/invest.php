<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Currency Tracker</title>
	<!--bootstrap !-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="onlineCatolog.css">

    <link rel="stylesheet" type="text/css" href="home.css" />
    <script src="add_user.js"></script> 
</head>
<body>
<h1>Crypto Currency tracker</h1>
<nav>
<form class="form-inline active-cyan-3 active-cyan-4">
  <i class="fas fa-search" aria-hidden="true"></i>
  <input id="search" class="form-control form-control-sm ml-3 w-25" type="text" placeholder="Search Currency Name" aria-label="Search">
  <input type="button" value="search">
</form>
</nav>
<div id="table">
	<table>
		<th>Currency</td>
		<th>Price</td>
		<th>Amount Invested</td>
<?php
	try
	{
	  $dbUrl = getenv('DATABASE_URL');

	  $dbOpts = parse_url($dbUrl);

	  $dbHost = $dbOpts["host"];
	  $dbPort = $dbOpts["port"];
	  $dbUser = $dbOpts["user"];
	  $dbPassword = $dbOpts["pass"];
	  $dbName = ltrim($dbOpts["path"],'/');

	  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $ex)
	{
	  echo 'Error!: ' . $ex->getMessage();
	  die();
	}
	$table ='<tr>hello</tr>';
	foreach ($db->query('SELECT user_id, name, price, amount FROM amount_invested') as $user_row){
		if($user_row['user_id'] == $_SESSION["userID"]){
			$table = $table ."<tr><td>". $currency_row['name']."</td><td>".$currency_row['price']."</td><td>". $currency_row['volume']."</td>".$addBTN."</tr>";
		} 
	}
	print($table)
?>
	</table>
</div>
</body>
</html>