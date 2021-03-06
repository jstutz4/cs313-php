<?php
session_start();
?>
<?php
include 'update_currency.php';

$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
$parameters = [
  #'start' => '1',
  'symbol' => $string_name,
  'convert' => 'USD'
];

$headers = [
  'Accepts: application/json',
  'X-CMC_PRO_API_KEY: b33eb643-f565-48ab-a45d-8cbc3cc59b1e'
];
$qs = http_build_query($parameters); // query string encode the parameters
$request = "{$url}?{$qs}"; // create the request URL


$curl = curl_init(); // Get cURL resource
// Set cURL options
curl_setopt_array($curl, array(
  CURLOPT_URL => $request,            // set the request URL
  CURLOPT_HTTPHEADER => $headers,     // set the headers 
  CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
));

$response = curl_exec($curl); // Send the request, save the response
//print($response);
$values = (json_decode($response, true));// print json decoded response
// now update the currency table
include 'connectHeroku.php';
for($i = 0; $i < count($currency_names); $i++){
	print("starting loop <br>");
	$price = $values["data"][$symbols[$i]]["quote"]["USD"]["price"];
	$volume = $values["data"][$symbols[$i]]["quote"]["USD"]["volume_24h"];
	$change = $values["data"][$symbols[$i]]["quote"]["USD"]["percent_change_24h"];
	print("looking " . number_format($price, 2, '.', '') . number_format(($volume/1000000000),1, '.', '') . $currency_names[$i] . $_SESSION['userID'] . "<br>");

	$stmt = $db->prepare('UPDATE currency SET price = :prices, change = :changes, volume = :volumes WHERE name = :currencyID AND user_id = :userID');
	$stmt->bindValue(':prices', number_format($price, 3, '.', ''));
	$stmt->bindValue(':changes', number_format($change, 2, '.', ''));
	$stmt->bindValue(':volumes', number_format(($volume/1000000000),2, '.', ''));
	$stmt->bindValue(':currencyID', $currency_names[$i]);
	$stmt->bindValue(':userID', $_SESSION['userID']);
	$stmt->execute();

	print("looking " . $price . $volume . "<br>");
}

curl_close($curl); // Close request

header('location: generate_table.php');
die();
?>