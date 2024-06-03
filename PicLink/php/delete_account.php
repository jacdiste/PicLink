<?php

if ( $_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: ../index.php");
}
else {
    $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
}

if($conn){
    session_start();
    $username = $_SESSION['username'];
    $q1 = "select * from utenti where username = $1";
    $res1 = pg_query_params($conn, $q1, array($username));
    $tuple = pg_fetch_assoc($res1);
    $hashed_password = $tuple['password'];
    if (!password_verify($_POST["password"], $hashed_password)) {
        $_SESSION['deleteaccount_error'] = "Password errata";
        
        header("Location: ../html/gamemode.php");
    }
    else {
        $q2 = "DELETE FROM utenti WHERE username=$1";
        if(pg_query_params($conn, $q2, array($username))==true){
            session_destroy();
            header("Location: ../index.php");
            exit();
        }
    }
}
?>