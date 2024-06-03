<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../html/register.html");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}

// Verifico se è stata stabilita la connessione al database;
// eseguo la query per verificare che non esiste una tupla con lo stesso username;
// se esiste, setto l'error nell'url e indirizzo a register.php;
// se l'username non è in uso, eseguo una query per verificare che non esiste una tupla con la stessa email;
// se esiste, setto l'error nell'url e indirizzo a register.php;
// se invece anche questa verifica è soddisfatta, genero la password hashata e eseguo la query per inserire la tupla relativa al nuovo account;
// indirizzo a register.php con successo.

if ($conn) {
    $username = $_POST['username'];
    $q1 = "select * from utenti where username=$1";
    $res = pg_query_params($conn, $q1, array($username));
    if ($tuple = pg_fetch_assoc($res)) {
        header("Location: ../html/register.php?error1=Nome utente già in uso");
    }
    else{
        $email = $_POST['email'];
        $q2 = "select * from utenti where email=$1";
        $res2 = pg_query_params($conn, $q2, array($email));
        if ($tuple = pg_fetch_assoc($res2)) {
            header("Location: ../html/register.php?error2=Email già in uso");
        }
        else{
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $q3 = "insert into utenti(username, email, password) values ($1, $2, $3)";
            $data = pg_query_params($conn, $q3, array($username, $email, $password));
            if($data){
                header("Location: ../html/register.php?success=1");
            }
        }
    }
}

