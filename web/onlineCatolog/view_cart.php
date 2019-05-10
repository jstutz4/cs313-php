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
    
    <div id="cart">
		<?php
			$titles;
			$images;
			$prices;
			if(!in_array($_GET["title"], $_SESSION["title"])){
				if(!isset($_SESSION["title"])){
					$titles[] = $_GET["title"];
				}
				else {
					$titles = $_SESSION["title"];
					$titles[] = $_GET["title"];
				}

				if(!isset($_SESSION["image_src"])){
					$images[] = $_GET["img_src"];
				}
				else {
					$images = $_SESSION["image_src"];
					$images[] = $_GET["img_src"];
				}

				if(!isset($_SESSION["price"])){
					$prices[] = $_GET["price"];
				}
				else {
					$prices = $_SESSION["price"];
					$prices[] = $_GET["price"];
				}

				$_SESSION["title"] = $titles;
				$_SESSION["image_src"] = $images;
				$_SESSION["price"] = $prices;
			}
		}
		else{
			$_SESSION["title"] = $_SESSION["title"];
			$_SESSION["image_src"] = $_SESSION["image_src"];
			$_SESSION["price"] = $_SESSION["price"];

		print(sizeof($titles));
		print(sizeof($_SESSION["image_src"]));
		print(sizeof($_SESSION["price"]));
		print($_SESSION["title"][0]);
		print('$' . array_sum($_SESSION["price"]));
		print('<br> $' . array_sum($prices));
		$total;
		for($i = 0; $i < sizeof($prices); $i++){
			$total = total + $_SESSION["price"][$i];
		}
		print('<br>' .$total . '<br>')
		?>
		<table>
		<?php
			for($i = 0; $i < sizeof($titles); $i++ ){
			print('<tr>');
				
					print('<td><img src="' . $_SESSION["image_src"][$i] . '"/></td>');
					print('<td>' . $_SESSION["title"][$i] . '</td>');
					print('<td>' . $_SESSION["price"][$i] . '</td>');
				
			print('</tr>');
			}
		?>
			<tr id="total">
				<td></td>
				<td>Total</td>
				<td> <?php print('$' . array_sum($_SESSION["price"])); ?> </td>
			</tr>
		</table>
    </div>

    <footer class="mainColor">
        <p class="margin0">Mom's Catolog</p>
        <p>Rexburg, Idaho 83440</p>
        <p class="margin0">208-356-6526</p>
        <p>momscatolog@gmail.com</p>
    </footer>
</body>
</html>