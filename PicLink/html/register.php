<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/x-icon" href="../foto/favicon.ico">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicLink</title>
    <link rel="stylesheet" href="../css/login&register.css">

   <script>
        var images = [];
        var slideTime = 3000;
        images[0] = '../foto/immagini-homepage/acqua.png';
        images[1] = '../foto/immagini-homepage/aereo.png';
        images[2] = '../foto/immagini-homepage/auto.png';
        images[3] = '../foto/immagini-homepage/avocado.png';
        images[4] = '../foto/immagini-homepage/bimbi.png';
        images[5] = '../foto/immagini-homepage/cane.png';
        images[6] = '../foto/immagini-homepage/elefante.png';
        images[7] = '../foto/immagini-homepage/fiori.png';
        images[8] = '../foto/immagini-homepage/gatto.png';
        images[9] = '../foto/immagini-homepage/mare.png';
        images[10] = '../foto/immagini-homepage/monte.png';
        images[11] = '../foto/immagini-homepage/sprechi.png';
        images[12] = '../foto/immagini-homepage/statua.png';
        var i = Math.floor(Math.random() * images.length); 
            
        function changePicture() {
            var bg1 = document.getElementById('bg1');
            var bg2 = document.getElementById('bg2');
            
            // Alterna l'opacità delle immagini
            if (bg1.style.opacity == 0 || bg1.style.opacity === "") {
                bg1.style.backgroundImage = "linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url(" + images[i] + ")";
                bg1.style.opacity = 1;
                bg2.style.opacity = 0;
            } else {
                bg2.style.backgroundImage = "linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url(" + images[i] + ")";
                bg2.style.opacity = 1;
                bg1.style.opacity = 0;
            }
        
            // Avanza l'indice delle immagini
            if (i < images.length - 1) {
                i++;
            } else {
                i = 0;
            }
        
            setTimeout(changePicture, slideTime);
        }
        
        window.onload = changePicture;
    </script> 
</head>
<body>
    <div id="background-container">
        <div class="background-image" id="bg1"></div>
        <div class="background-image" id="bg2"></div>
    </div>
    <div class="wrapper">
        <form action="../php/validate_register.php" method="post">
            <h1>Registrazione</h1>
            
            <div class="input-box">
                <input type="text" name="username" placeholder="Nome utente" required />
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
                </svg>
            </div>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required />
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                    <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                </svg>
            </div>
            
            <div class="input-box">
                <input id="password" type="password" name="password" placeholder="Password" required />
                <svg id="lock" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16" cursor="pointer" onclick="myFunction()">
                    <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2m3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2"/>
                </svg>

                <svg id="unlock" xmlns="http://www.w3.org/2000/svg" display="none" width="16" height="16" fill="currentColor" class="bi bi-unlock-fill" viewBox="0 0 16 16" cursor="pointer" onclick="myFunction()">
                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2"/>
                  </svg>
            </div>

            <script src="../javascript/login&register.js"></script>

            <?php 
                if(isset($_GET['error1'])) {
                    echo "<div class='error'>";
                    echo "<span>";
                    echo $_GET['error1'] . ".";
                    echo "</span>"; 
                    echo "</div>";
                }
                if(isset($_GET['error2'])) {
                    echo "<div class='error'>";
                    echo "<span>";
                    echo $_GET['error2'] . ".";
                    echo "<br><br>";
                    echo "Clicca <a href='./login.php'>qui</a> per accedere.";
                    echo "</span>"; 
                    echo "</div>";
                    echo "<style>
                          .button{
                            display: none;
                          }
                          .registration-link{
                            display: none;
                          }
                          </style>";
                }
                if(isset($_GET['success'])) {
                    echo "<div class='success'>";
                    echo "<span>";
                    echo "Registrazione avvenuta con successo" . ".";
                    echo "<br><br>";
                    echo "Clicca <a href='./login.php'>qui</a> per accedere.";
                    echo "</span>"; 
                    echo "</div>";
                    echo "<style>
                          .button{
                            display: none;
                          }
                          .registration-link{
                            display: none;
                          }
                          .success a{
                            color: green;
                          }
                          </style>";
                }
            ?>

            <button type="submit" class="button">Registrati</button>
            
            <div class="registration-link">
                <p id="p">Hai già un account? <a href="./login.php">Accedi</a></p>
            </div>
        </form>
    </div>
</body>
</html>