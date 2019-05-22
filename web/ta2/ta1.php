<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>The HTML5 Herald</title>
    <meta name="description" content="Teach 05">
    <meta name="author" content="SitePoint">

    <link rel="stylesheet" href="css/styles.css?v=1.0">

</head>

<body>
<script src="js/scripts.js"></script>


<?php
if (pg_num_rows($result) > 0) {
    // output data of each row
    while($row = pg_fetch_assoc($result)) {
        echo $row["book"]. " " . $row["chapter"]. ":" . $row["verse"]. "<br>" . $row["content"] . "<br><br>";
    }
} else {

}
$conn->close();

?>
</body>
</html>