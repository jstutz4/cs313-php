<?php
session_start();
?>

<?php

$table = htmlspecialchars($_GET['table']);
$rowID = htmlspecialchars($_GET['rowID']);



foreach($db->prepare('SELECT ' . $rowID 'FROM ' . $table) as $worker){
	print($worker);
}

print("varible " . $table . $rowID);
?>