<?php
session_start();
?>
<?php
print("session " .$_SESSION['user_name'] . $_SESSION['userID']);

$name = htmlspecialchars($_GET['name']);
$price = htmlspecialchars($_GET['price']);
$volume = htmlspecialchars($_GET['volume']);
$unique = true;
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, name FROM currency') as $user_row){
	if($user_row['user_id'] == $_SESSION['userID'] && $user_row['name'] == $name){
		$unique = false;
	}
}

if($unique){
	$stmt = $db->prepare('INSERT INTO currency(name, price, volume) VALUES(:name, :price, :volume)');
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':price', $price);
	$stmt->bindValue(':volume', $volume);
	$stmt->execute();
}
else {
	print("You are already tracking $name");
}



?>