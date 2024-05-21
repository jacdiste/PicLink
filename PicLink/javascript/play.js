var parametriGET = window.location.search.substring(1);
parametriGET = parametriGET.split("&");

var tema = parametriGET[0].split("=")[1];
var level = parametriGET[1].split("=")[1];

var numliv= document.getElementById("numero-livello").innerText="LIVELLO "+level;
const foto = document.getElementsByClassName("foto");

for (let i=0; i<foto.length; i++) {
    foto[i].src="../foto/Gioco/Tema "+tema+"/"+level+"/"+(i+1)+".png";
}

const back = document.getElementById("back");

back.addEventListener("click", () => {
    window.location = "./levels.html?tema="+tema;
});

function togglePopup() { 
    const overlay = document.getElementById('popupOverlay'); 
    if(document.getElementById('answer-input').value == "COLOSSEO") {
        overlay.classList.toggle('show'); 
    }
    else {
        alert("Si na latrin");
    }
} 