<?php
session_start();
?>
<?php
print("session " .$_SESSION['user_name'] . $_SESSION['userID']);

include 'update_currency.php';
$const = array("data", "quote", "USD", "price");
$info = $_POST['info'];
$test = $info['data'][$money_name]['quote']['USD']['price'];
print($test);

include 'connectHeroku.php';
foreach($currency_names as $money_name){
	$price = $info["data"][$money_name]["quote"]["USD"]["price"];

	$stmt = $db->prepare('UPDATE currency SET price = :total WHERE name = :nameid AND user_id = :userID ');
	$stmt->bindValue(':total', $price);
	$stmt->bindValue(':rowid', $money_name);
	$stmt->bindValue(':rowID', $_SESSION['userID']);
	$stmt->execute();
}
?>