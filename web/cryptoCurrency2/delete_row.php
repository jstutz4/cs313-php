<?php
session_start();
?>

<?php

$table = htmlspecialchars($_GET['table']);
$rowID = htmlspecialchars($_GET['rowID']);
if($table == "currency"){
$query = 'DELETE FROM ' . $table . ' WHERE money_id = '. $rowID;
}
else{
$query = 'DELETE FROM ' . $table . ' WHERE invest_id = '. $rowID;

}
print($query);

include 'connectHeroku.php';

$stmt = $db->prepare($query);
$stmt->execute();

print("varible " . $table . $rowID);

header('location: home.php');
?>