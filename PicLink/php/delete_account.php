<?php
session_start();

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.html");
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
        $username = $_SESSION['username'];
        $query = "DELETE FROM utenti WHERE username=$1";
        if(pg_query_params($conn, $query, array($username))==true){
            echo "<h1> Eliminazione avvenuta con successo</h1>
                  <a href=../index.html> Clicca qui per tornare all'homepage</a>";
        }
        else{
            echo "Eliminazione non avvenuta";
        }

        pg_close($conn);

        session_destroy();

        //header("Location: ../index.html");
        exit();
    ?>
</body>
</html>