<?php
session_start();
?>

<?php

$table = htmlspecialchars($_GET['table']);
$rowID = htmlspecialchars($_GET['rowID']);


include 'connectHeroku.php';
$query = 'DELETE FROM' . $table . ' WHERE id = '. $rowID;

foreach ($db->query('SELECT * FROM currency') as $worker){
	print($worker);
}

print("varible " . $table . $rowID);
?>