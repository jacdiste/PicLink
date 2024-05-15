<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: /");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}
?>

<!DOCTYPE html>
<html lang="it">
<head></head>
<body>
    <?php
        if ($conn) {
            
        }
    ?>
</body>
</html>