<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = (($_GET['password']));

print($user_name . $password);

?>