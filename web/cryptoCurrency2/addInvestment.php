<?php
$name = htmlspecialchars($_GET['name']);
$price = htmlspecialchars($_GET['price']);
$amount = htmlspecialchars($_GET['amount']);

include 'connectHeroku.php';

print($name . $price . $amount);

?>