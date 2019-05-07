<?php
$titles;
$images;
$prices;
$buttons;

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
	print("<td>" . $titles[$i] . "</td>");
}
?>
		</tr>
	</table>
</div>
