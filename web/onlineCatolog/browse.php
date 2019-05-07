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
$num_groups = (sizeof($titles) % $row_length) - 1;
$num_groups = number_format($num_groups, 0);
reset($titles);
for($i = 0; $i < $num_groups; $i++){
	print("<tr>");
	for($j = 0; $j < $row_length; $j++){
		if($i == 0){
			print("<td>" . current($titles) . "</td>");
		}
		else{
		print("<td>" . next($titles) . "</td>");
		}
	}
	print("</tr>");
}
?>
		
	</table>
</div>
