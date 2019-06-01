<?php
$user_name = $_GET["user_id"];
$isUser = false;
foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
	if($user_name == $user_row['user_name'] || $_SESSION['user_name'] == $user_row['user_name']){
		$isUser = true;
	}
}

if(isset($user_name)){
	$_SESSION["user_name"] = $user_name;
}

if(!isset($_SESSION['user_name'])){
	header('Location: logout.php');
}
if($isUser){
	$_SESSION['user_name'];
	$_SESSION['userID'];
	$userID;
	$table = "<table><th>currency</th><th>price</th><th>volume</th><th>Invest</th><th>Invest Amount</th><th>delete</th>";
	//$add_user = "<tr><td>" . $user_row['user_id'] . "</td> <td>" . $user_row['user_name']. "</td>";
	$addBTN = '<td><input type="button" name="' . $currency_row['name'] . '" value="invest" onclick="investing()"></td><td><input type="number"> </td>';
	$currency = $_GET['currency'];


	if (isset($currency) && $currency != "") {
		//$table = $table . "heres0";
		foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
			if($user_row['user_name'] == $_SESSION["user_name"]){
				//$userID = $user_row['user_id'];
				//$table = $table . "heres1" . $_SESSION["userID"] . $_SESSION["user_name"];
				foreach ($db->query('SELECT user_id, name, price, volume FROM currency') as $currency_row){
					if($currency_row['user_id'] == $_SESSION["userID"] && $currency_row['name'] == $currency){
						$table = $table .'<tr><td class="'. $currency_row['name'] . '">'. $currency_row['name'].'</td><td class="'. $currency_row['name'] . '">'.$currency_row['price']."</td><td>". $currency_row['volume']."</td>". '<td><input type="button" name="' . $currency_row['name'] . '" value="invest" onclick="investing(this)"></td><td class="'. $currency_row['name'] . '"><input type="number"> </td><td><input type="button" value="delete" name="currency" onclick="deleteRow('.$currency_row['user_id'].','. '"currency")"></td></tr>'; 
					}
				}
			} 
		}
	}
	elseif(isset($_SESSION["user_name"]) || isset($_SESSION['userID'])){
		foreach ($db->query('SELECT user_id, user_name FROM users') as $user_row){
			if($user_row['user_name'] == $_SESSION["user_name"] || $user_row['user_id'] == $_SESSION['userID']){
				$userID = $user_row['user_id'];
				$_SESSION["userID"] = $userID;
				$_SESSION["user_name"] = $_SESSION["user_name"];
				foreach ($db->query('SELECT user_id, name, price, volume FROM currency') as $currency_row){
					if($currency_row['user_id'] == $userID){
						$table = $table .'<tr><td class="'. $currency_row['name'] . '">'. $currency_row['name'].'</td><td class="'. $currency_row['name'] . '">'.$currency_row['price']."</td><td>". $currency_row['volume']."</td>". '<td><input type="button" name="' . $currency_row['name'] . '" value="invest" onclick="investing(this)"></td><td class="'. $currency_row['name'] . '"><input type="number"> </td><td><input type="button" value="delete" onclick="deleteRow(' . '2' . ', currency '.')"></td></tr>'; 
					}
				}
			} 
		}
	}


	print($table . '</table>' . '<input type="hidden" id="hidden" name="'. $_SESSION['user_name'] . '" value="' . $_SESSION['user_name'] . '" readonly>');
}
else{
	header('Location: login.php?title=sorry User Name Not Valid');
}

?>