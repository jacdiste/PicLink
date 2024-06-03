<?php
    session_start(); 

// Verifico se è stata settata la variabile di sessione username;
// mi connetto al database ed eseguo una query per prendere tutti i dati relativi a quell'utente nel database;
// li salvo in formato json e li metto a disposizione di chiamate get ajax.

    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());

    if(isset($_SESSION['username'])) {
        $q1 = 'select * from utenti where username= $1';
        $data = pg_query_params($conn, $q1, array($_SESSION['username']));
        $tuple = pg_fetch_assoc($data);
        $json = json_encode($tuple);
        
        echo $json;
    }   