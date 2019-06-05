<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = password_hash(($_GET['password']));

print($user_name . $password);

?>