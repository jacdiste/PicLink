<?php
    session_start();

// Verifico se è stata settata la variabile di sessione username;
// mi connetto al database ed eseguo una query per modificare il valore dei soldi dopo l'acquisto;
// salvo il nuovo netto dei soldi nella variabile di sessione money;
// eseguo un' ultima query per segnalare che l'avatar in questione è stato sbloccato.

    if(isset($_SESSION['username'])) {
        if (isset($_POST['costo'])) {
            $costo = (int) $_POST['costo'];
            $avatar = $_POST['avatar'];
            $indice = (int) $_POST['indice'];

            $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
            $q1 = 'update utenti set money = money - $1 where username = $2';
            $data = pg_query_params($conn, $q1, array($costo, $_SESSION['username']));

            $q2 = 'select * from utenti where username = $1';
            $data = pg_query_params($conn, $q2, array($_SESSION['username']));
            $tuple = pg_fetch_assoc($data);

            $_SESSION['money'] = $tuple["money"];

            $q3 = 'update utenti set avatarscelto='.$avatar.'where username = $1'; 
            $data = pg_query_params($conn, $q3, array($_SESSION['username']));

            $q4 = 'update utenti set avatar[$1]=true where username = $2';
            $data = pg_query_params($conn, $q4, array($indice, $_SESSION['username']));
        }
    } 