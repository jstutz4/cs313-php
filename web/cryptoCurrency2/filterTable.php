<?php
session_start();
?>

<?php

$tableID = htmlspecialchars($_GET['table']);
$currency = htmlspecialchars($_GET['name']);

print("working" . $_SESSION['userID']. "<br>" . $table . $currency);
if($tableID == 'currency'){
print("working currency table <br>");
	$table = '<table class="tableCurrency"><th>currency</th><th>price</th><th>volume (B)</th><th>24hr % Change<th>Invest</th><th>Invest Amount</th><th>delete</th>';
	foreach ($db->query('SELECT user_id, name, price, change, volume, symbol FROM currency') as $currency_row){
		if($currency_row['user_id'] == $_SESSION["userID"] && $currency_row['name'] == $currency){
			$table = $table .'<tr><td class="'. $currency_row['name'] . '">'. $currency_row['name'].'</td><td class="'. $currency_row['name'] . '" name='. $currency_row['symbol'] .'">'.$currency_row['price']."</td><td>". $currency_row['volume']."</td><td>".$currency_row['change'] . '</td><td><input type="button" name="' . $currency_row['name'] . '" value="invest" onclick="investing(this)"></td><td class="'. $currency_row['name'] . '"><input type="number"> </td><td><input type="button" value="delete" onclick="deleteRow(\'currency\', ' . $currency_row['money_id'].')"></td></tr>';  
		}
	}
}
else{
print("working invest table <br>");
$table = '<table class="investments"><th>Currency</th><th>Amount Invested ($)</th><th>Coins Bought</th><th>% Change</th><th>$ Change</th><th>Delete Investment</td>';
	foreach ($db->query('SELECT user_id, name, amount, coin, prechange, amount_change FROM amount_invested') as $user_row){
		if($user_row['user_id'] == $_SESSION["userID"]){
			if($user_row['name'] == $currency){
				$table = $table ."<tr><td>". $user_row['name']."</td><td>".$user_row['amount']."</td><td>". $user_row['coin'].'</td><td>' . $user_row['prechange'] . '</td><td>'. $user_row['amount_change'].'</td><td><input type="button" value="delete" name="amount_invested" onclick="deleteRow(\'amount_invested\', ' . $user_row['invest_id'] .')"></td></tr>';
			}
		} 
	}
}

?>