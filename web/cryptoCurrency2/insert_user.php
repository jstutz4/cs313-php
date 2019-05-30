<?php

$userName = htmlspecialchars($_POST['user_id']);

include 'connectHeroku.php';
print("done with connect");
?>
<?php
$stmt = $db->prepare('INSERT INTO users(user_name) VALUES(:user_name);');
print("done with prepare");
?>
<?php
$stmt->bindValue(':user_name', $userName, PDO::PARAM_TEXT);
print("done with bindValue");
?>
<?php
$stmt-> execute();
print("done with execute");
?>
<php
$title = 'Now Login With You New User Name';
header('Location: login.php?title=$title');
die();
?>