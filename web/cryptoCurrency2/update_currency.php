<?php
session_start();
?>

<?php
$currency_names = array();
$symbols = array();
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_id'] == $_SESSION["userID"]){
		foreach ($db->query('SELECT money_id, user_id, symbol, name FROM currency') as $currency_row){
			if($currency_row['user_id'] == $_SESSION['userID']){
				$symbols[] = $currency_row['symbol'];
				$currency_names[] = $currency_row['name'];
			}
		}
	} 
}
$string_name;
for($i = 0; $i < count($symbols); $i++){
	if($i == count($symbols)-1){
	$string_name = $string_name . $symbols[$i];
	}
	else{
	$string_name = $string_name . $symbols[$i].',';
	}
}
print("strings " .$string_name);
?>