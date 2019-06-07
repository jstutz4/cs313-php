<?php
session_start();
?>
<?php

$name = htmlspecialchars($_GET['currency']);
$price = htmlspecialchars($_GET['price']);
$amount = htmlspecialchars($_GET['amount']);
$symbol = htmlspecialchars($_GET['symbol']);
$user_id = $_SESSION['userID'];
$update = false;
$start_amount = 0;
$rowID;
$coins = number_format(($amount/$price), 3, '.', "");
$prechange = number_format(((($coin*$price) - $amount)/$amount), 3, '.', '');
$amount_change = number_format(((($coin*$price) - $amount)), 3, '.', '');

include 'connectHeroku.php';


foreach ($db->query('SELECT invest_id, user_id, name, amount FROM amount_invested') as $user_row){
	if($user_row['user_id'] == $user_id && $user_row['name'] == $name){
		$update = true;
		$rowID = $user_row['invest_id'];
		$start_amount = $user_row['amount'] + $amount;
	}
}

if($update){
	$stmt = $db->prepare('UPDATE amount_invested SET amount = :total WHERE invest_id = :rowID ');
	$stmt->bindValue(':total', $start_amount);
	$stmt->bindValue(':rowID', $rowID);
	$stmt->execute();
}
else{

	$stmt = $db->prepare('INSERT INTO amount_invested(user_id, name, amount, coin, prechange, amount_change) VALUES(:user_id, :name, :amount, :coins, :prechanges, :amount_changes)');
	$stmt->bindValue(':user_id', $user_id);
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':amount', $amount);
	$stmt->bindValue(':coin', $coins);
	$stmt->bindValue(':prechange', $prechange);
	$stmt->bindValue(':amount_changes', $amount_change);
	$stmt->execute();
}

//print($user_name. $name . $price . $amount .$user_id . $start_amount);

header('location: updateInvestTable.php');


?>