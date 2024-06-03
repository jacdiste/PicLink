<?php
$conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());

// Verifico se è stata stabilita la connessione al database;
// eseguo la query per accedere alla tupla relativa all'email inserita;
// se l'email non esiste, setto l'error nell'url e indirizzo verso login.php;
// se l'email è presente nel database, eseguo un'altra query per estrarre la password e la confronto con quella immessa dall'utente;
// se le password non sono uguali, setto l'error nell'url e indirizzo verso login.php;
// se la verifica va a buon fine, inizio la sessione settando tutte le variabili di interesse (username, money, email) e indirizzo a gamemode.php.

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

            $username = $tuple['username'];
            $_SESSION["username"] = $username;

            $money = $tuple['money'];
            $_SESSION["money"] = $money;

            $email = $tuple['email'];
            $_SESSION["email"] = $email;
            
            header("Location: ../html/gamemode.php");
        }
    }
}

