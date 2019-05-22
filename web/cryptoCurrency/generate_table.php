<?php
$SESSION["user"] = $_POST["user"];

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}
$table = "<table><th>user id</th><th>user name</th>";
foreach ($db->query('SELECT user_id, user_name FROM users') as $row){
$table = $table . "<tr><td>" . $row['user_id'] . "</td> <td>" . $row['user_name']. "</td></tr>";
}

print($table . '<table>');
?>