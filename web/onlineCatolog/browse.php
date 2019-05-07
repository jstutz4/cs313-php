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
$num_groups = (sizeof($titles) % $row_length) -1;
$num_groups = number_format($num_groups, 0);
reset($titles);
print("<tr><td>" . current($titles) "</td><td>" . next($titles) . "</td><td>" . next($titles) . "</td></tr>");
for($i = 0; $i < $num_groups; $i++){
	print("<tr>");
	for($i = 0; $i < $row_length; $i++){
	print("<td>" . next($titles) . "</td>");
	}
	print("</tr>");
}
?>
		
	</table>
</div>
