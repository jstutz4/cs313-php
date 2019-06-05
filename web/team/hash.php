<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = password_hash(($_GET['password']), PASSWORD_DEFAULT);



include 'connectHeroku.php'

$stmt = $db->prepare('INSERT INTO person VALUES(:userName, :password)');
$stmt->bindValue(':user_name', $user_name);
$stmt->bindValue(':password', $password);
$stmt->execute();

print($user_name . $password);
?>