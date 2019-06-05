<?php
$user_name = htmlspecialchars($_GET['user_name']);
$password = password_hash(htmlspecialchars($_get['password']));

print($password);

?>