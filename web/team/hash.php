<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = password_hash(($_GET['password']), PASSWORD_DEFAULT);
$passwords =(($_GET['password']));


print($user_name . $password);

include 'connectHeroku.php';

$stmt = $db->prepare('INSERT INTO person (user_name, password) VALUES(:userName, :password)');
$stmt->bindValue(':userName', $user_name);
$stmt->bindValue(':password', $passwords);
$stmt->execute();

print($user_name . $password);
?>