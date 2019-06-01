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

print("checking dulication");
foreach ($db->query('SELECT user_id, name FROM currency') as $user_row){
	if($user_row['user_id'] == $_SESSION['userID'] && $user_row['name'] == $name){
		$unique = false;
	}
}

print("passing and now inserting");
if($unique){
	$stmt = $db->prepare('INSERT INTO currency(user_id, name, price, volume) VALUES(:user_id, :name, :price, :volume)');
	$stmt->bindValue(':user_id', $_SESSION['userID');
	$stmt->bindValue(':name', $name);
	$stmt->bindValue(':price', $price);
	$stmt->bindValue(':volume', $volume);
	$stmt->execute();
}
else {
	print("You are already tracking $name");
}


print("varibles: $name , $price , $volume");
?>