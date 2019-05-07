<?php
$titles;
$images;
$prices;
$buttons;
$row_length = 3;

$titles_file = fopen("titles.txt", "r");
while(! feof($titles_file)){
	$titles[] = fgets($titles_file);
}
fclose($titles_file);
?>
<div id="items">
	<table>
		
<?php
reset($titles);
while(next($titles)){
	print("<tr>");
	for($i = 0; $i <= $row_length; $i++){
	print("<td>" . next($titles) . "</td>");
	}
	print("</tr>");
}
?>
		
	</table>
</div>
