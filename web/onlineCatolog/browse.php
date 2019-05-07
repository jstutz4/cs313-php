<?php
$titles;
$images;
$prices;
$img_description;
$buttons;
$row_length = 3;

$titles_file = fopen("titles.txt", "r");
while(! feof($titles_file)){
	list($titles[], $imges[], $img_description, $prices[]) = explode(",", fgets($titles_file), -1);
}
fclose($titles_file);
?>
<div id="items">
	<table>
		
<?php
$num_groups = (sizeof($titles) % $row_length);
$num_groups = number_format($num_groups, 0);
reset($titles);
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
	reset($images);
	reset($img_description);
		print("<tr>");
		for($j = 0; $j < $row_length; $j++){
			if($i == 0 && $j == 0){
				print('<td><img src="' . current($imges) . '"alt="' . current($img_description) . '"/></td>');
			}
			else{
				print('<td><img src="' . next($imges) . '"alt="' . next($img_description) . '"/></td>');
			}
		}
		print("</tr>");

	reset($prices);
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
			print('<td> <input type="button" value="add to cart" /></td>');
		}
	print("</tr>");
}
?>
		
	</table>
</div>
