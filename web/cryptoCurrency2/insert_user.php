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


print("all good");

#header("Location: login.php?title=Now Login With You New User Name");
}
else{
print("not right");
#header("Location: login.php?title=sorry that user name is already taken");
}
?>