<?php

$userName = htmlspecialchars($_POST['user_id']);

include 'connectHeroku.php';

$stmt = $db->prepare('INSERT INTO users(user_name) VALUES(:user_name);');
$stmt->bindValue(':user_name', $userName, PDO::PRAM_TEXT);
$stmt-> execute();

$title = 'Now Login With You New User Name';
header('Location: login.php?title=$title');
die();
?>