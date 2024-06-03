<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}

if($conn){
    session_start();
    $email = $_SESSION['email'];
    $newemail = $_POST['newemail'];
    $q1 = "select * from utenti where email=$1";
    $res1 = pg_query_params($conn, $q1, array($newemail));
    if($tuple = pg_fetch_assoc($res1)){
        $_SESSION['newemail_error'] = "Nuova e-mail già in uso";
        header("Location:../html/gamemode.php");
    }
    else{
        $q2 = "update utenti set email=$1 where email=$2";
        $res2 = pg_query_params($conn, $q2, array($newemail, $email));
        if($res2){
            $_SESSION['email'] = $newemail;
            header("Location:../html/gamemode.php");
        }
    }
    exit();
}
?>