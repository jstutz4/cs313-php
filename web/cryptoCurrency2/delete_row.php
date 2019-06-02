<?php
session_start();
?>

<?php

$table = htmlspecialchars($_GET['table']);
$rowID = htmlspecialchars($_GET['rowID']);
$query = 'DELETE FROM ' . $table . ' WHERE id = '. $rowID;
print($query);

include 'connectHeroku.php';

//$stmt = $db->prepare($query);
//$stmt->execute();

print("varible " . $table . $rowID);

header('location: home.php');
?>