<?php
$assignment_links = array();
$assignment_links[] = "assignment1.html";

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Home | Assignments</title>
    <link rel="stylesheet" type="text/css" href="assign.css" />
</head>
<body>
<h1>Welcome To The Assignments Page</h1>
print("<ul>");
for($i = 0; $i < sizeof($assignment_links); $i++){
	print("<li><a href='".$assignment_links[i]."'>".substr($assignment_links[i],0, -5)."</a></li>");
}
print("</ul>")
</body>
<html>
?>