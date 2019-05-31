<?php
$name = htmlspecialchars($_GET['currency']);
$price = htmlspecialchars($_GET['price']);
$amount = htmlspecialchars($_GET['amount']);

include 'connectHeroku.php';

print($name. $_SESSION['userID'] . $price . $amount);
?>
<?php
$stmt = $db->prepare('INSERT INTO amount_invested(user_id, name, price,amount) VALUES(:user_id, :name, :price, :amount)');

$stmt->bindValue(':user_id', $_SESSION['userID']);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':price', $price);
$stmt->bindValue(':amount', $amount);
$stmt->execute();



?>