<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../foto/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicLink</title>
    <link rel="stylesheet" href="../css/play.css">
    <script src="../javascript/play.js" defer></script>
</head>
<body>
    <div class="level-info">
        <img id="back" src="../foto/freccia-sinistra.png"/>
        <span id="numero-livello"></span>
        <svg id="gobackhome" xmlns="http://www.w3.org/2000/svg" class="bi bi-house-fill" viewBox="0 0 16 16" fill:>
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
            <span id="monetepopup"></span>
            <button class="bottonepopup" id="prossimolvl">Prossimo livello</button> 
            <button class="bottonepopup" id="tornamenu">Torna al menu</button>
        </div> 
    </div>
</body>
</html>