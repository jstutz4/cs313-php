<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="onlineCatolog.css">
    <title>Online Catolog | Shopping Card</title>
</head>
<body>
    <h1 class="mainColor">Online Mom's Catolog</h1>
    <nav class="navbar">
        <span class="navbar-text">
            <a class="navbar-brand" href="browse.php">Browse</a>
            <a class="navbar-brand" href="view_cart.php">shopping Cart</a>
        </span>
    </nav>
    
	<div id="order">
		<h1>Your Order Will Be Shipped To:</h1>
		<p>
		<?php
		$street = htmlspecialchars ($_POST["street"]);
		$city = htmlspecialchars ($_POST["city"]);
		$state = htmlspecialchars ($_POST["state"]);
		$zip = htmlspecialchars ($_POST["zip"]);

		print("$street <br> $city, $state, $zip");
		?>
		</p>
		<?php
			for($i = 0; $i < sizeof($_SESSION["image_src"]); $i++ ){
					print('<img src="' . $_SESSION["image_src"][$i] . '"/>');
			}

		?>
		<h2>Your Order Will Arrive In Three Days!</h2>
		<p>Thanks For Shopping With Mom's Catolog</p>
	</div>

    <footer class="mainColor">
        <p class="margin0">Mom's Catolog</p>
        <p>Rexburg, Idaho 83440</p>
        <p class="margin0">208-356-6526</p>
        <p>momscatolog@gmail.com</p>
    </footer>
</body>
</html>
<?php
	session_unset();
	session_destroy();
?>