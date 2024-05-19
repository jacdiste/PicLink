const bottoni=document.getElementsByClassName("bottone");

var tema = window.location.search.substring(1);
tema= tema.split("=")[1];

for (let i=0; i<bottoni.length; i++) {
    bottoni[i].addEventListener("click", (event) => {
        let numero = event.target.name;
        window.location = "./play.html?tema="+tema+"&level=" + numero;
    });
}