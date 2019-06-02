<?php
session_start();
?>

<?php

$table = htmlspecialchars($_GET['table']);
$rowID = htmlspecialchars($_GET['rowID']);


include 'connectHeroku.php';
$query = 'DELETE FROM ' . $table . ' WHERE id = '. $rowID.';';
print($query);

$stmt = $db->prepare($query);
	$stmt->execute();

print("varible " . $table . $rowID);

header('location: home.php');
?>