<?php
session_start();
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="Teach06">
    <meta name="author" content="SitePoint">


</head>

<body>
<h1>Insert Scripture</h1>

<form method="post" action="display.php">

    Book:<br>
    <input type="text" name="book"><br>
    Chapter:<br>
    <input type="text" name="chapter"><br>
    Verse:<br>
    <input type="text" name="verse"><br>
    Content:<br>
    <textarea  rows="4" cols="50" name="content"></textarea><br>

    <h2><b>Topic</b></h2>

    <br>
    <button type="submit" name="insert">Insert</button>


</form>

<a href="query_scriptures.php">See DB scriptures</a>


</body>
</html>