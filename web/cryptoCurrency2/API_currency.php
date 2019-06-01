<?php
$symbol = $_GET['currency'];
$url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/quotes/latest';
$parameters = [
  #'start' => '1',
  'symbol' => $symbol,
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
$usd = $values["data"]["$symbol"]["quote"]["USD"];
$twoVal = (json_decode($response));
$twousd = $twoVal["data"]["$symbol"]["quote"]["USD"];

print($usd . '\n' . $twousd);
curl_close($curl); // Close request
?>