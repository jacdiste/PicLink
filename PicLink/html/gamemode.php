

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicLink</title>
    <link rel="stylesheet" href="../css/gamemode.css">
    <script src="../javascript/gamemode.js" defer></script>
</head>
<body>

    <div id="profile">
        <div id="avatar-bar">
            <div class="avatar" id="avatar">
                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
            </div>
                <span class="username" id="user"> </span>
        </div>

        <div id="money-container">
            <span id="money"> </span>
            
            <div class="money-icon"> 
                <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" class="bi bi-coin" viewBox="0 0 16 16">
                    <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                    <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                </svg>
            </div>
        </div>
    </div>

    <div class="themes-container">
        <div class="theme">
            <picture> 
                <source media="(max-height:799px)" srcset="../foto/immagini-temi/animali-telefono2.png" />
                <source media="(max-width:599px)" srcset="../foto/immagini-temi/animali-telefono.png" /> 
                <source media="(min-width:600px) and (max-width:1300px)" srcset="../foto/immagini-temi/animali-tablet.png" />
                <source media="(min-width:1299px)" srcset="../foto/immagini-temi/animali.jpg" />
                <img class="foto-tema animali" src="../foto/immagini-temi/animali.jpg" />
            </picture> 

            <div class="theme-block" id="sblocca-animali">
                <img id="lucchetto" src="../foto/lucchetto.png" />
                <button class="bottone-sblocca" id="bottone-sblocca-animali">
                    <span id="span-animali">Sblocca</span>
                    <br>
                    <div id="money-block">
                        <span>0</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                        </svg>
                    </div>
                </button>
            </div>
            <div class="text-box">
                <div class="text animal">Tema animali</div>
            </div>
        </div>

        <div class="theme arte">
            <picture> 
                <source media="(max-height:799px)" srcset="../foto/immagini-temi/arte-telefono2.png" />
                <source media="(max-width:599px)" srcset="../foto/immagini-temi/arte-telefono.png" />
                <source media="(min-width:600px) and (max-width:1300px)" srcset="../foto/immagini-temi/arte-tablet.png" />
                <source media="(min-width:1299px)" srcset="../foto/immagini-temi/arte.jpg" />
                <img class="foto-tema arte" src="../foto/immagini-temi/arte.jpg" />
            </picture> 

            <div class="theme-block" id="sblocca-arte">
                <img id="lucchetto" src="../foto/lucchetto.png" />
                <button class="bottone-sblocca" id="bottone-sblocca-arte">
                    <span id="span-arte">Sblocca</span>
                    <br>
                    <div id="money-block">
                        <span>200</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                        </svg>
                    </div>
                </button>
            </div>
            <div class="text-box">
                <div class="text">Tema arte</div>
            </div>
        </div>

        <div class="theme anime">
            <picture> 
                <source media="(max-height:799px)" srcset="../foto/immagini-temi/anime-telefono2.png" />
                <source media="(max-width:599px)" srcset="../foto/immagini-temi/anime-telefono.png" /> 
                <source media="(min-width:600px) and (max-width:1300px)" srcset="../foto/immagini-temi/anime-tablet.png" />
                <source media="(min-width:1299px)" srcset="../foto/immagini-temi/anime.jpg" />
                <img class="foto-tema anime" src="../foto/immagini-temi/anime.jpg" />
            </picture> 

            <div class="theme-block" id="sblocca-anime">
                <img id="lucchetto" src="../foto/lucchetto.png" />
                <button class="bottone-sblocca" id="bottone-sblocca-anime">
                    <span id="span-anime">Sblocca</span>
                    <br>
                    <div id="money-block">
                        <span>400</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="black" class="bi bi-coin" viewBox="0 0 16 16">
                            <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518z"/>
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                            <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11m0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12"/>
                        </svg>
                    </div>
                </button>
            </div>
            <div class="text-box">
                <div class="text">Tema anime</div>
            </div>
        </div>

        <a class="prev" id="prev">&#10094;</a>
        <a class="next" id="next">&#10095;</a>
    </div>

    <div class="dropdown">
            <form action="../php/logout.php" method="post">
                <button class="bottone" type="submit">Disconnetti</button>
            </form>

            <button class="bottone" id="cancellaaccount">Cancella Account</button>
    </div>    

        <div id="popupOverlay" class="overlay-container"> 
            <div class="popup-box"> 
                <?php 
                    if(isset($_GET['error'])){
                        echo "<span id='titolopopup' class='error'>Password errata, ritenta.</span>";
                    }
                    else{
                        echo "<span id='titolopopup'>Vuoi veramente eliminare l'account?</span>";
                    }
                ?>
                <form action="../php/delete_account.php" method="post">
                    <div class="input-box">
                        <input id="password" type="password" name="password" placeholder="Password" required />
                            <svg id="lock" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" cursor="pointer">
                                <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                            </svg>

                            <svg id="unlock" xmlns="http://www.w3.org/2000/svg" display="none" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16" cursor="pointer">
                                <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                            </svg>
                    </div>
                    <button class="bottonepopup" type="submit">Conferma</button>
                    <button class="bottonepopup" id="indietro_cancellaaccount">Indietro</button>    
                </form>        
            </div> 
        </div>
        
    <div id="play">       
        <button class="bottone" id= "gioca" name="gioca">GIOCA</button>
    </div>

</body>
</html>