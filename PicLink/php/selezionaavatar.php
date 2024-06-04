<?php
    session_start();

// Verifico se è stata settata la variabile di sessione username;
// mi connetto al database ed eseguo una query per modificare l'avatar scelto nel database;

    if(isset($_SESSION['username'])) {
        if (isset($_POST['avatar'])) {
            $avatar = $_POST['avatar'];

            $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());

            $q1 = 'update utenti set avatarscelto=$1 where username = $2'; 
            $data = pg_query_params($conn, $q1, array($avatar, $_SESSION['username']));
        }
    } 