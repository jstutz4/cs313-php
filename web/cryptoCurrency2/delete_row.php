<?php
session_start();
?>

<?php

$table = htmlspecialchars($_GET['table']);
$rowID = htmlspecialchars($_GET['rowID']);



$stmt = $db->prepare('SELECT :rowsID FROM :table');
	$stmt->bindValue(':table', $table);
	$stmt->bindValue(':rowID', $rowID);
	$stmt->execute();

print("varible " . $table . $rowID);
?>