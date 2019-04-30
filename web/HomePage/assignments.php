<?php
$assignment_links = new array();
$assignment_links[] = "assignment1.html";
$name = substr($assignment_links[0],0, -4)

print("<ul>");
for($i = 0; $i < sizeof($assignment_links); $i++){
	print("<li><a href='".$assignment_links[i]."'>$name</a></li>")
}
print("</ul>")

?>