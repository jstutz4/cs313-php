<?php

$userName = htmlspecialchars($_POST['user_id']);
$unique = true;
include 'connectHeroku.php';

foreach ($db->query('SELECT user_name FROM users') as $user_row){
	if($user_row['user_name'] == $userName){
		$unique = false;
	}
}
if($unique){
$stmt = $db->prepare('INSERT INTO users(user_name) VALUES(:user_name)');
$stmt->bindValue(':user_name', $userName);
$stmt->execute();

header("Location: login.php?title=<h4>Now Login With You New User Name</h4>");
}
else{
header("Location: login.php?title=<h1>sorry that user name is already taken</h1>");
}
?>