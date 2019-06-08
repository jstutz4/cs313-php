<?php
session_start();
?>
<?php

include 'connectHeroku.php';
$table = '<table class="investments"><th>Currency</th><th>Amount Invested ($)</th><th>Coins Bought</th><th>% Change</th><th>$ Change</th><th>Delete Investment</td>';
	$name = $_GET['currency'];

	if(isset($name)){
	//this is the filter 
		foreach ($db->query('SELECT invest_id, user_id, name, amount, coin, prechange, amount_change FROM amount_invested') as $user_row){
			if($user_row['user_id'] == $_SESSION["userID"]){
				if($user_row['name'] == $name){
					$table = $table ."<tr><td>". $user_row['name']."</td><td>".$user_row['amount']."</td><td>". $user_row['coin'].'</td><td>' . $user_row['prechange'] . '</td><td>'. $user_row['amount_change'].'</td><td><input type="button" value="delete" name="amount_invested" onclick="deleteRow(\'amount_invested\', ' . $user_row['invest_id'] .')"></td></tr>';
				}
			} 
		}
	}
	elseif(!isset($name)){
	// this is not filtering
		foreach ($db->query('SELECT invest_id, user_id, name, amount, coin, prechange, amount_change FROM amount_invested') as $user_row){
			if($user_row['user_id'] == $_SESSION["userID"]){
				$table = $table ."<tr><td>". $user_row['name']."</td><td>".$user_row['amount']."</td><td>". $user_row['coin'].'</td><td>' . $user_row['prechange'] . '</td><td>'. $user_row['amount_change'].'</td><td><input type="button" value="delete" name="amount_invested" onclick="deleteRow(\'amount_invested\', ' . $user_row['invest_id'] .')"></td></tr>';
			} 
		}
	}
	print($table . '</table>');
?>