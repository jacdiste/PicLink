<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PicLink</title>
    <link rel="stylesheet" href="./css/homepage.css">
    
    <!-- Script che implementa lo slideshow sullo sfondo. -->
    <script>
        var images = [];
        var slideTime = 3000;
        images[0] = './foto/immagini-homepage/acqua.png';
        images[1] = './foto/immagini-homepage/aereo.png';
        images[2] = './foto/immagini-homepage/auto.png';
        images[3] = './foto/immagini-homepage/avocado.png';
        images[4] = './foto/immagini-homepage/bimbi.png';
        images[5] = './foto/immagini-homepage/cane.png';
        images[6] = './foto/immagini-homepage/elefante.png';
        images[7] = './foto/immagini-homepage/fiori.png';
        images[8] = './foto/immagini-homepage/gatto.png';
        images[9] = './foto/immagini-homepage/mare.png';
        images[10] = './foto/immagini-homepage/monte.png';
        images[11] = './foto/immagini-homepage/panino.png';
        images[12] = './foto/immagini-homepage/sprechi.png';
        images[13] = './foto/immagini-homepage/statua.png';
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
    <div id="titolo">
        <img src="./foto/titolo.png" class="titolo"/>
    </div>
    
    <div id="bottoni">
        <button class="bottone-homepage" name="Login">ACCEDI</button>
        <button class="bottone-homepage" name="Registration">REGISTRATI</button>
    </div>
    <script src="./javascript/homepage.js"></script>
</body>
</html>