<?php
session_start();
?>

<?php
print("session" . $_SESSION['user_name'] . $_SESSION['userID']);
$currency_names = array();
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_id'] == $_SESSION["userID"]){
		foreach ($db->query('SELECT money_id, user_id name FROM currency') as $currency_row){
			if($currency_row['user_id'] == $_SESSION['userID']){
				$currency_names[] = $currency_row['name'];
			}
		}
	} 
}

print ($currency_names[0] . ' and ' . $currency_names[1]);
?>