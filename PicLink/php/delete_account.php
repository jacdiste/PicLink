<?php

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
        session_start();
        $username = $_SESSION['username'];
        $q1 = "select * from utenti where username = $1";
        $res1 = pg_query_params($conn, $q1, array($username));
        $tuple = pg_fetch_assoc($res1);
        $hashed_password = $tuple['password'];
        if (!password_verify($_POST['password'], $hashed_password)) {
            echo "<script>
                  alert('Password errata');
                  </script>";
        }
        else {
            $q2 = "DELETE FROM utenti WHERE username=$1";
            if(pg_query_params($conn, $q2, array($username))==true){
                header("Location: ../index.html");
                echo "<script>
                      alert('Eliminazione avvenuta con successo');
                      </script>";

            }
        }

        pg_close($conn);

        session_destroy();

        exit();
    ?>
</body>
</html>