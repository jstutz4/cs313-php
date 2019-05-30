<?PHP
if ($_SERVER["REQUEST_METHOD"] == "POST"){
	print("received data and will execute");
	header("Location: login.php"); 
}

?>

<form id="newUser" class="login" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h4>Enter Your Desired User Name</h4>
	<input id="uName" type="text" name="user_id" placeholder="user_id" required length=10>
	<input type="submit" name="add_user" value="Register">
</form>