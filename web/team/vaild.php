<?php
session.start();
?>

<?php
$user_name = htmlspecialchars($_POST['user_name']);
$password = password_hash(($_POST['password']), PASSWORD_DEFAULT);

$_SESSION['userName'];

print($user_name . $password);

include 'connectHeroku.php';

if(isset($user_name) && isset($password){
foreach ($db->query('SELECT user_name, password FROM person') as $user_row){
	if($user_row['user_name'] == $user_name){
		$_SESSION['userName'] = $user_name;
	}
}
if(isset($_SESSION['userName'])){
	$stmt = $db->prepare('INSERT INTO person (user_name, password) VALUES(:userName, :password)');
	$stmt->bindValue(':userName', $user_name);
	$stmt->bindValue(':password', $password);
	$stmt->execute();

	header('location: welcome.php');
}

print($user_name . $password);
?>