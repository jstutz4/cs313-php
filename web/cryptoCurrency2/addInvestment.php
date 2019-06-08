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
$prechange = number_format((($coins * $price)- $amount)/100, 3, '.', '');
$amount_change = number_format(($coins * $price) - $amount, 3, '.', '');

include 'connectHeroku.php';
print('session ' . $_SESSION['userID'] . $name . $amount .$user_id . $start_amount);

print('if add to investment <br>');
foreach ($db->query('SELECT invest_id, user_id, name, amount, coin FROM amount_invested') as $user_row){
	if($user_row['user_id'] == $user_id && $user_row['name'] == $name){
		$update = true;
		$rowID = $user_row['invest_id'];
		$coins = $coins + $user_row['coin'];
		$amount = $user_row['amount'] + $amount;
		$prechange = number_format((($coins * $price)- $amount)/100, 3, '.', '');
		$amount_change = number_format(($coins * $price) - $amount, 3, '.', '');
	}
}
print('after check investment <br>');

if($update){
print('stop adding to  investment <br>');

	$stmt = $db->prepare('UPDATE amount_invested SET amount = :total, coin = :coins, prechange = :prechanges, amount_change = :amount_changes WHERE invest_id = :rowID ');
	$stmt->bindValue(':user_id', $user_id);
	$stmt->bindValue(':amount', $amount);
	$stmt->bindValue(':coins', $coins);
	$stmt->bindValue(':prechanges', $prechange);
	$stmt->bindValue(':amount_changes', $amount_change);
	$stmt->bindValue(':rowID', $rowID);
	$stmt->execute();
}
else{
print('inserting new  investment <br>');

	$stmt = $db->prepare('INSERT INTO amount_invested(user_id, name, amount, coin, prechange, amount_change) VALUES(:user_id, :name, :amount, :coins, :prechanges, :amount_changes)');
	$stmt->bindValue(':user_id', $user_id);
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':amount', $amount);
	$stmt->bindValue(':coins', $coins);
	$stmt->bindValue(':prechanges', $prechange);
	$stmt->bindValue(':amount_changes', $amount_change);
	$stmt->execute();
}

print('all done');
//header('location: updateInvestTable.php);


?>