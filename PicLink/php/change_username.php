<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}

// Verifico se è stata stabilita la connessione al database;
// eseguo una query per verificare se il nuovo username è già presente nel database;
// se è presente, creo una variabile di sessione per gestire l'errore in gamemode.php;
// se la verifica va a buon fine, eseguo la query per aggiornare la tupla e salvo il nuovo username nella var. di sessione.

if($conn){
    session_start();
    $username = $_SESSION['username'];
    $newusername = $_POST['newusername'];
    $q1 = "select * from utenti where username=$1";
    $res1 = pg_query_params($conn, $q1, array($newusername));
    if($tuple = pg_fetch_assoc($res1)){
        $_SESSION['newusername_error'] = "Nuovo username già in uso";
        header("Location:../html/gamemode.php");
    }
    else{
        $q2 = "update utenti set username=$1 where username=$2";
        $res2 = pg_query_params($conn, $q2, array($newusername, $username));
        if($res2){
            $_SESSION['username'] = $newusername;
            header("Location:../html/gamemode.php");
        }
    }
    exit();
}
?>