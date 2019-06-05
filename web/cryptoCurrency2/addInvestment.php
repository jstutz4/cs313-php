<?php

$user_name = htmlspecialchars($_GET['hidden']);
$name = htmlspecialchars($_GET['currency']);
$price = htmlspecialchars($_GET['price']);
$amount = htmlspecialchars($_GET['amount']);
$user_id;
$update = false;
$start_amount = 0;
$rowID;
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_name'] == $user_name){
		$user_id = $user_row['user_id'];
	}
}

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

	$stmt = $db->prepare('INSERT INTO amount_invested(user_id, name, price,amount) VALUES(:user_id, :name, :price, :amount)');
	$stmt->bindValue(':user_id', $user_id);
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':price', $price);
	$stmt->bindValue(':amount', $amount);
	$stmt->execute();
}

//print($user_name. $name . $price . $amount .$user_id . $start_amount);

header('location: invest.php');


?>