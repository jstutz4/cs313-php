<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = password_hash(htmlspecialchars($_get['password']));

print($user_name . $password);

?>