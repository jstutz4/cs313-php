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

<?php


$book = pg_escape_string($_POST['book']);
$chapter = pg_escape_string($_POST['chapter']);
$verse = pg_escape_string($_POST['verse']);
$content = pg_escape_string($_POST['content']);


if (isset($_POST['1'])){
    $topic_faith = 1;
}
if (isset($_POST['2'])){
    $topic_sacrifice = 2;
}
if (isset($_POST['3'])){
    $topic_charity = 3;
}

include 'connectHeroku.php';

$query = 'INSERT INTO Scriptures (book, chapter, verse, content) VALUES('.$book .','. $chapter . ',' .$verse . "," . $content.')';

$result = pg_quary($db, $query);
print("here we are " . $result);
?>

</body>
</html>