<?php
session_start();
?>

<?php
$currency_names;
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_id'] == $_SESSION["userID"]){
		foreach ($db->query('SELECT money_id, name FROM currency') as $currency_row){
			if($currency_row['user_id'] == $_SESSION['userID']){
				$currency_names[] = array($currency_row['name']);
			}
		}
	} 
}

print ($currency_names[0] . ' and ' . $currency_names[1]);
?>