<?php
$id = $_GET["id"];
$athlete;

$jsonData = file_get_contents("athlete1.json", $str);
$athletes = json_decode($jsonData, true);
/*
for($i = 0; $i < sizeof($athletes); $i++){
  if($athletes[$i][id] == $id){
   $athlete = $athletes[$i][dictionary];
   print("look: " . $athlete[0]);
   //print("look: " . var_dump($athlete));
    $isSame = true;
  }
}

if(!$isSame){
  $str = json_encode($athlete);
   print("\n".$str."\n");
}
*/

$str = json_encode($athletes);
print("\n".$str."\n");

?>