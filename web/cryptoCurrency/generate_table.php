<?php
$SESSION["userName"] = $_POST["user"];
$SESSION["userID"];
$user_name = $_GET["user"];

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
$userID;
$table = "<table><th>user id</th><th>user name</th><th>currency</th><th>price</th><th>volume</th>";
foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_name'] == $user_name){
		$userID = $user_row['user_id'];
		$table = $table . "<tr><td>" . $user_row['user_id'] . "</td> <td>" . $user_row['user_name']. "</td>";
	}
		foreach ($db->query('SELECT user_id, name, price, volume FROM currency') as $currency_row){
			if($currency_row['user_id'] == $userID ){
				$table = $table + "<td>". $currency_row['name']."</td><td>".$currency_row['price']."</td><td>". $currency_row['volume']."</td></tr>";
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