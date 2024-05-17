<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../html/register.html");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($conn) {
            $email = $_POST["email"];
            $q1 = "select * from utenti where email = $1";
            $res = pg_query_params($conn, $q1, array($email));
            if (!($tuple = pg_fetch_assoc($res, null, PGSQL_ASSOC))) {
                echo "<h1> Email non esistente </h1>
                    <a href=../html/register.html> Clicca qui per registrarti </a>";
            }
            else {
                $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $q2 = "select * from utenti where email = $1 and password = $2";
                $res = pg_query_params($conn, $q2, array($email, $password));
                if (!($tuple = pg_fetch_assoc($res, null, PGSQL_ASSOC))) {
                    echo "<h1> La password è sbagliata! </h1>
                        <a href = ../html/login.html> Clicca qui per loggarti </a>";
                }
                else {
                    echo "<a href=../html/gamemode.html> Clicca qui </a>";
                }
            }
        }
    ?>
</body>
</html>
