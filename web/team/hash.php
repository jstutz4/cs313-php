<?php
$user_name = htmlspecialchars($_POST['user_name']);
$password = password_hash(htmlspecialchars($_POST['password']));

print($password)

?>