<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}

// Verifico se è stata stabilita la connessione al database;
// eseguo una query per verificare se la nuova password non è uguale alla precedente;
// se è così, creo una variabile di sessione per gestire l'errore in gamemode.php;
// se la verifica va a buon fine, eseguo la query per aggiornare la tupla.

if($conn){
    session_start();
    $username = $_SESSION['username'];
    $q1 = "select * from utenti where username = $1";
    $res1 = pg_query_params($conn, $q1, array($username));
    $tuple = pg_fetch_assoc($res1);
    $current_hashed_password = $tuple['password'];
    if (password_verify($_POST["password"], $current_hashed_password)) {
        $_SESSION['newpassword_error1'] = "Nuova password uguale alla precedente";
        
        header("Location:../html/gamemode.php");
    }
    else {
        $newpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $q2 = "update utenti set password=$1 where username=$2";
        $res2 = pg_query_params($conn, $q2, array($newpassword, $username));

        header("Location:../html/login.php");
    }
    exit();
}
?>