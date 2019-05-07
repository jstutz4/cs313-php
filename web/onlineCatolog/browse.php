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
		<tr>
<?php
for($i = 0; $i < sizeof($titles); $i++){
	
	print("<td>" . next($titles) . "</td>");
}
?>
		</tr>
	</table>
</div>
