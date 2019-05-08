   <!--generate table!-->
<?php
	$titles;
	$images;
	$prices;
	$img_description;
	$buttons;
	$row_length = $_GET["numRow"];

	$titles_file = fopen("titles.txt", "r");
	while(! feof($titles_file)){
		list($titles[], $images[], $img_description[], $prices[]) = explode(",", fgets($titles_file));
	}
	fclose($titles_file);
?>
	<table>	
<?php
$stop = (sizeof($titles) % $row_length);
$num_groups = ceil((sizeof($titles) / $row_length));
$num_groups = number_format($num_groups, 0);
reset($titles);
reset($images);
reset($img_description);
reset($prices);
print($num_groups."<br>");
print($stop."<br>");
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
	//adding prices
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
	//adding add to cart button
	print("<tr>");
		for($j = 0; $j < $row_length; $j++){
			if($i >= $num_groups - 1 && $j >= $stop){
				//do nothing
			}
			else{
				print('<td> <input type="button" value="add to cart" /></td>');
			}
		}
	print("</tr>");
}
?>
		
	</table>