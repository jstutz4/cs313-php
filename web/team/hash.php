<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = password_hash(($_GET['password']), PASSWORD_DEFAULT);

print($user_name . $password);

include 'connectHeroku.php';

$stmt = $db->prepare('INSERT INTO person (user_name, password) VALUES(:userName, :password)');
$stmt->bindValue(':user_name', $user_name);
$stmt->bindValue(':password', $password);
#$stmt->execute();

print($user_name . $password);
?>