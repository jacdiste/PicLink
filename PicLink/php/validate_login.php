<?php
$conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());

if($conn) {
    $email = $_POST["email"];
    $q1 = "select * from utenti where email = $1";
    $res = pg_query_params($conn, $q1, array($email));
    if (!($tuple = pg_fetch_assoc($res))) {
       header("Location: ../html/login.php?error=Email non esistente&linka=true");
    }
    else {
        $q2 = "select * from utenti where email = $1";
        $res2 = pg_query_params($conn, $q2, array($email));
        $tuple = pg_fetch_assoc($res2);
        $hashed_password = $tuple['password'];
        if (!password_verify($_POST["password"], $hashed_password)) {
            header("Location: ../html/login.php?error=Password errata");
        }
        else {
            session_start();

            //salvo l'username in una variabile superglobale di sessione
            $username = $tuple['username'];
            $_SESSION["username"] = $username;

            //trovo il numero di monete relative all'utente e salvo il dato in un'altra variabile superglobale di sessione
            $money = $tuple['money'];
            $_SESSION["money"] = $money;

            echo "<a href=../html/gamemode.php> Clicca qui </a>";
        }
    }
}

