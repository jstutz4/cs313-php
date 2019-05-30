<?php
$id = $_POST["fName"]." ".$_POST["lName"]." ".$_POST["DOB"];
$athlete2 = array("a_first_name" => $_POST["fName"],
                  "a_middle_name" => $_POST["mName"],
                  "a_last_name" => $_POST["lName"],
                  "DOB" => $_POST["DOB"],
                  "age" => $_POST["age"],
                  "grade" => $_POST["grade"],
                  "gender" => $_POST["gender"],
                  "citizen" => $_POST["citizen"],
                  "uniform" => $_POST["uniformSize"],
                  "street" => $_POST["street"],
                  "city" => $_POST["city"],
                  "state" => $_POST["state"],
                  "zip" => $_POST["zip"],
                  "parent_first_name" => $_POST["p1fName"],
                  "parent_last_name" => $_POST["p1lName"],
                  "parent_number" => $_POST["p1Number"],
                  "parent_email" => $_POST["p1Email"],
                  "parents_first_name" => $_POST["p2fName"],
                  "parents_last_name" => $_POST["p2lName"],
                  "parents_number" => $_POST["p2Number"],
                  "parents_email" => $_POST["p2Email"]
                  );   
                             
$jsonData = file_get_contents("athlete1.json");
$athletes2 = json_decode($jsonData, true); 
$isSame = false;


for($i = 0; $i < sizeof($athletes2); $i++){
  if($athletes2[$i][id] == $id){
    $athletes2[$i][dictionary] = $athlete2;
    $isSame = true;
  }
}
if(!$isSame){
  $athletes2[] = array("id" => $id, "dictionary" => $athlete2);
}

for($i = 0; $i < sizeof($athletes2); $i++){
    $csv[] = $athletes2[$i][dictionary];
}

$str = json_encode($athletes2);
//print($str);
print("launch paypal here");
file_put_contents("athlete1.json",$str);



$json = json_encode($csv);
jsonToCsv($json, "athlete.csv");

//print($str);
 function jsonToCsv ($json, $csvFilePath = false, $boolOutputFile = false) {
    
    // See if the string contains something
    if (empty($json)) { 
      die("The JSON string is empty!");
    }
    
    // If passed a string, turn it into an array
    if (is_array($json) === false) {
      $json = json_decode($json, true);
    }
    
    // If a path is included, open that file for handling. Otherwise, use a temp file (for echoing CSV string)
    if ($csvFilePath !== false) {
      $f = fopen($csvFilePath,'w+');
      if ($f === false) {
        die("Couldn't create the file to store the CSV, or the path is invalid. Make sure you're including the full path, INCLUDING the name of the output file (e.g. '../save/path/csvOutput.csv')");
      }
    }
    else {
      $boolEchoCsv = true;
      if ($boolOutputFile === true) {
        $boolEchoCsv = false;
      }
      $strTempFile = 'csvOutput' . date("U") . ".csv";
      $f = fopen($strTempFile,"w+");
    }
    
    $firstLineKeys = false;
    foreach ($json as $line) {
      if (empty($firstLineKeys)) {
        $firstLineKeys = array_keys($line);
        fputcsv($f, $firstLineKeys);
        $firstLineKeys = array_flip($firstLineKeys);
      }
      
      // Using array_merge is important to maintain the order of keys acording to the first element
      fputcsv($f, array_merge($firstLineKeys, $line));
    }
    fclose($f);
    
    // Take the file and put it to a string/file for output (if no save path was included in function arguments)
    if ($boolOutputFile === true) {
      if ($csvFilePath !== false) {
        $file = $csvFilePath;
      }
      else {
        $file = $strTempFile;
      }
      
      // Output the file to the browser (for open/save)
      if (file_exists($file)) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename='.basename($file));
        header('Content-Length: ' . filesize($file));
        readfile($file);
      }
    }
    elseif ($boolEchoCsv === true) {
      if (($handle = fopen($strTempFile, "r")) !== FALSE) {
        while (($data = fgetcsv($handle)) !== FALSE) {
          echo implode(",",$data);
          echo "<br />";
        }
        fclose($handle);
      }
    }
    
    // Delete the temp file
    unlink($strTempFile);
    
  }

?>