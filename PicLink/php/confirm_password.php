<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}

// Verifico se è stata stabilita la connessione al database;
// eseguo una query per verificare che la password inserita è corretta;
// se non lo è, creo una variabile di sessione per gestire l'errore in gamemode.php;
// se la verifica va a buon fine, creo una var. di sessione per indicare che la conferma è avvenuta con successo.

if($conn){
    session_start();
    $username = $_SESSION['username'];
    $q1 = "select * from utenti where username = $1";
    $res1 = pg_query_params($conn, $q1, array($username));
    $tuple = pg_fetch_assoc($res1);
    $hashed_password = $tuple['password'];
    if (!password_verify($_POST["password"], $hashed_password)) {
        $_SESSION['newpassword_error'] = "Password attuale errata";
        header("Location:../html/gamemode.php");
    }
    else {
        $_SESSION['password_confirmation'] = 1;
        header("Location:../html/gamemode.php");
    }
    exit();
}
?>