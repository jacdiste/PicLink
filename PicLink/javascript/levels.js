const bottoni=document.getElementsByClassName("bottone");

var tema = window.location.search.substring(1);
tema= tema.split("=")[1];

for (let i=0; i<bottoni.length; i++) {
    if (i>0) {
        bottoni[i].style.backgroundColor = "grey";
        bottoni[i].disabled = true;
    }

    bottoni[i].addEventListener("click", (event) => {
        let numero = event.target.name;
        window.location = "./play.php?tema="+tema+"&level=" + numero;
    });
}
