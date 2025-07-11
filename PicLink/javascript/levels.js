const bottoni=document.getElementsByClassName("bottone");

var tema = window.location.search.substring(1);
tema= tema.split("=")[1];

//get ajax per dati utente dal database
var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);
        
        //gestione livelli
        var livelli = data["tema "+tema];
        livelli = livelli.substring(1,livelli.length-1);
        livelli = livelli.split(",");

        var back = document.getElementById("back");

        back.addEventListener("click", () => {
            sessionStorage.setItem("tema",tema);
            window.location = "./gamemode.php";
        });

        for (let i=0; i<bottoni.length; i++) {
            if (i>0) {
                if (livelli[i-1]=="f") {
                    bottoni[i].disabled=true;
                }
            }

            bottoni[i].addEventListener("click", (event) => {
                let numero = event.target.name;
                window.location = "./play.php?tema="+tema+"&level=" + numero;
            });
        }
    }
}

xhr.open("GET", "../php/database-call.php", true);
xhr.send();
