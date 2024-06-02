<?php 
    session_start(); 
    if(isset($_SESSION['username'])) {
        if (isset($_POST['monete'])) {
            $money = (int) $_POST['monete'];
            $tema = $_POST['tema'];
            $livello = (int) $_POST['livello'];

            $conn = pg_connect("host=localhost port=5432 dbname=PicLink user=postgres password=0000") or die("Could not connect: " . pg_last_error());
            $q1 = 'update utenti set money = money + $1 where username = $2';
            $data = pg_query_params($conn, $q1, array($money, $_SESSION['username']));

            $q2 = 'select * from utenti where username = $1';
            $data = pg_query_params($conn, $q2, array($_SESSION['username']));
            $tuple = pg_fetch_assoc($data);

            $_SESSION['money'] = $tuple["money"];

            $q3 = 'update utenti set "tema '.$tema; 
            $q3 .= '"[$1]=true where username = $2';
            $data = pg_query_params($conn, $q3, array($livello, $_SESSION['username']));
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/play.css">
    <script src="../javascript/play.js" defer></script>
</head>
<body>
    <div class="level-info">
        <img id="back" src="../foto/freccia-sinistra.png"/>
        <span id="numero-livello"></span>
        <svg id="gobackhome" xmlns="http://www.w3.org/2000/svg" class="bi bi-house-fill" viewBox="0 0 16 16">
          <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z"/>
          <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293z"/>
        </svg>
    </div>

    <div class="images-container">
        <div class="image top-left"> 
            <img class="foto" draggable="false"/>
        </div>
        <div class="image top-right">
            <img class="foto" draggable="false"/>
        </div>
        <div class="image bottom-left">
            <img class="foto" draggable="false"/>
        </div>
        <div class="image bottom-right"> 
            <img class="foto" draggable="false"/>
        </div>
    </div>

    <div class="answer">
        <input id="answer-input" placeholder="Scrivi qui la tua risposta" autocomplete="off"/>
        <button type="submit" id="link">
            <img class="fotolink" src="../foto/link button1.png" draggable="false"/>
        </button>
    </div>

    <div id="popupOverlay" class="overlay-container"> 
        <div class="popup-box"> 
            <h2 id="titolopopup">HAI INDOVINATO!</h2> 
            <span id="monetepopup">Hai guadagnato N monete!</span>
            <button class="bottonepopup" id="prossimolvl">Prossimo livello</button> 
            <button class="bottonepopup" id="tornamenu">Torna al menu</button>
        </div> 
    </div>
</body>
</html>