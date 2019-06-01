<?php
	session_start();
	session_unset();
	session_destroy();
?>

<?php
header('location: login.php');
?>