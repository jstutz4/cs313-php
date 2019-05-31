<?php

$user_name = htmlspecialchars($_GET['hidden']);
$name = htmlspecialchars($_GET['currency']);
$price = htmlspecialchars($_GET['price']);
$amount = htmlspecialchars($_GET['amount']);
$user_id;
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_name'] == $user_name){
		$user_id = $user_row['user_id'];
	}
}

$stmt = $db->prepare('INSERT INTO amount_invested(user_id, name, price,amount) VALUES(:user_id, :name, :price, :amount)');

$stmt->bindValue(':user_id', $user_id);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':price', $price);
$stmt->bindValue(':amount', $amount);
$stmt->execute();

print($user_name. $name . $price . $amount .$user_id);


?>