<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../html/register.html");
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
            $username = $_POST['username'];
            $q1 = "select * from utenti where username=$1";
            $res = pg_query_params($conn, $q1, array($username));
            if ($tuple = pg_fetch_assoc($res)) {
                echo "<h1> Nome utente già esistente</h1>
                      <a href=../html/login.html> Clicca qui per accedere</a>";
            }
            else{
                $email = $_POST['email'];
                $q2 = "select * from utenti where email=$1";
                $res2 = pg_query_params($conn, $q2, array($email));
                if ($tuple = pg_fetch_assoc($res2)) {
                    echo "<h1> Email già esistente</h1>
                         <a href=../html/login.html> Clicca qui per accedere</a>";
                }
                else{
                    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                    $q3 = "insert into utenti values ($1, $2, $3)";
                    $data = pg_query_params($conn, $q3, array($username, $email, $password));
                    if($data){
                        echo "<h1> Registrazione avvenuta con successo</h1>
                              <a href=../html/login.html> Clicca qui per accedere</a>";
                    }
                }
            }
        }
    ?>
</body>
</html>