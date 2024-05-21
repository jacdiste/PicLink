var parametriGET = window.location.search.substring(1);
parametriGET = parametriGET.split("&");

var tema = parametriGET[0].split("=")[1];
var level = parametriGET[1].split("=")[1];

var numliv= document.getElementById("numero-livello").innerText="LIVELLO "+level;
const foto = document.getElementsByClassName("foto");

for (let i=0; i<foto.length; i++) {
    foto[i].src="../foto/Gioco/Tema "+tema+"/"+level+"/"+(i+1)+".png";
}

//Prendo la soluzione e la salvo in una variabile
var sol;
var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var json = JSON.parse(xhr.responseText);
        sol = json[tema][level-1];
    }
}

xhr.open("GET", "../foto/Gioco/soluzioni.JSON", true);
xhr.send();

const back = document.getElementById("back");

back.addEventListener("click", () => {
    window.location = "./levels.html?tema="+tema;
});

function togglePopup() {
    var sol;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(xhr.responseText);
            sol = json[tema][level-1];

            var answer = document.getElementById('answer-input').value.toUpperCase();
            
            const overlay = document.getElementById('popupOverlay');

            if (parseInt(level) == 12) {
                document.getElementById('prossimolvl').disabled = true;
            }
        
            if (sol.includes(answer)) {
                overlay.classList.toggle('show'); 
            }
            else {
                alert("Si na latrin");
            }
        }
    }

    xhr.open("GET", "../foto/Gioco/soluzioni.JSON", true);
    xhr.send();
}

function next () {
    window.location = "./play.html?tema="+tema+"&level=" + (parseInt(level)+1);
}