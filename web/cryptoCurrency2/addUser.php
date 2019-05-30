<form id="newUser" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h4>Enter Your Desired User Name</h4>
	<input id="uName" type="text" name="user_id" placeholder="user_id" required length=10>
	<input type="submit" name="add_user" value="Register">
</form>