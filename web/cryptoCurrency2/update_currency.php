<?php
session_start();
?>

<?php
$currency_names = array();
include 'connectHeroku.php';

foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_row['user_id'] == $_SESSION["userID"]){
		foreach ($db->query('SELECT money_id, user_id, name FROM currency') as $currency_row){
			if($currency_row['user_id'] == $_SESSION['userID']){
				$currency_names[] = $currency_row['currency_id'];
			}
		}
	} 
}
$string_name;
for($i = 0; $i < count($currency_names); $i++){
	if($i == count($currency_names)-1){
	$string_name = $string_name . $currency_names[$i];
	}
	else{
	$string_name = $string_name . $currency_names[$i].',';
	}
}
print("strings " .$string_name);
?>