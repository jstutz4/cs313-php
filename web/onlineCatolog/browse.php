<!doctype html >
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="onlineCatolog.css">

    <title>Online Catolog | Everything Moms need</title>
</head>
<body>
    <h1 class="mainColor">Online Mom's Catolog</h1>
    <nav class="navbar">
        <span class="navbar-text">
        <a class="navbar-brand" href="#">Browse</a>
        <a class="navbar-brand" href="#">shopping Cart</a>
        </span>
    </nav>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    !-->

   <!--generate table!-->
<?php
	$titles;
	$images;
	$prices;
	$img_description;
	$buttons;
	$row_length = 2;

	$titles_file = fopen("titles.txt", "r");
	while(! feof($titles_file)){
		list($titles[], $images[], $img_description[], $prices[]) = explode(",", fgets($titles_file));
	}
	fclose($titles_file);
?>
<div id="items">
	<table>
		
<?php
$num_groups = (sizeof($titles) / $row_length);
$num_groups = number_format($num_groups, 0);
reset($titles);
reset($images);
reset($img_description);
reset($prices);
print($num_groups."<br>");
for($i = 0; $i < $num_groups; $i++){
	//adding item titles
	print("<tr>");
	for($j = 0; $j < $row_length; $j++){
		if($i == 0 && $j == 0){
			print("<td>" . current($titles) . "</td>");
		}
		else{
			print("<td>" . next($titles) . "</td>");
		}
	}
	print("</tr>");
	//adding images row
	
		print("<tr>");
		for($j = 0; $j < $row_length; $j++){
			if($i == 0 && $j == 0){
				print('<td><img src="' . current($images) . '" alt="' . current($img_description) . '"/></td>');
			}
			else{
				print('<td><img src="' . next($images) . '" alt="' . next($img_description) . '"/></td>');
			}
		}
		print("</tr>");

	print("<tr>");
		for($j = 0; $j < $row_length; $j++){
			if($i == 0 && $j == 0){
				print('<td>' . current($prices) . '</td>');
			}
			else{
				print('<td>' . next($prices) . '</td>');
			}
		}
	print("</tr>");

	print("<tr>");
		for($j = 0; $j < $row_length; $j++){
			if(current($titles) == !false){
				print('<td> <input type="button" value="add to cart" /></td>');
			}
		}
	print("</tr>");
}
?>
		
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