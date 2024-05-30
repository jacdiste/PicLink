var parametriGET = window.location.search.substring(1);
parametriGET = parametriGET.split("&");

var tema = parametriGET[0].split("=")[1];
var level = parametriGET[1].split("=")[1];

var numliv= document.getElementById("numero-livello").innerText="LIVELLO "+level;

var images = document.getElementsByClassName("foto");

for (var i=0; i<images.length; i++) {
    images[i].src="../foto/Gioco/Tema "+tema+"/"+level+"/"+(i+1)+".png";
    if (i!=0) {
        images[i].style.visibility = "hidden";
    }
}

const time1 = 10;
const time2 = 20;
const time3 = 30;

let timePassed1 = 0;
let timePassed2 = 0;
let timePassed3 = 0;

let timeLeft1 = time1;
let timeLeft2= time2;
let timeLeft3= time3;

function showTime (time) {
    var minuti = Math.floor(time / 60);

    var secondi = time % 60;
    if (secondi < 10) {
        secondi = "0" + secondi;
    }

    return minuti + ":" + secondi;
}

var containers = document.getElementsByClassName("image");

for (let i=1; i<images.length; i++) {
    containers[i].style.backgroundColor = "grey";

    if (i==1) {
        containers[i].insertAdjacentHTML("beforeend",`
            <svg class="timer" id="timer1" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g class="timer-inside">
                    <circle class="timer-circle" id="timercircle1" cx="50" cy="50" r="45" />
                </g>
                <text id="timer-label1" x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"> ${showTime(time1)} </text>
            </svg>`);
    }
    else if (i==2) {
        containers[i].insertAdjacentHTML("beforeend",`
            <svg class="timer" id="timer2" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g class="timer-inside">
                    <circle class="timer-circle" id="timercircle2" cx="50" cy="50" r="45" />
                </g>
                <text id="timer-label2" x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"> ${showTime(time2)} </text>
            </svg>`);
    }
    else {
        containers[i].insertAdjacentHTML("beforeend",`
            <svg class="timer" id="timer3" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <g class="timer-inside">
                    <circle class="timer-circle" id="timercircle3" cx="50" cy="50" r="45" />
                </g>
                <text id="timer-label3" x="50%" y="50%" dominant-baseline="middle" text-anchor="middle"> ${showTime(time3)} </text>
            </svg>`);
    }
}
let timer = null;
let primo = false, secondo = false, terzo = false;
startTimer();

function startTimer() {
    timer = setInterval(() => {
        if(timeLeft1>0) {
            timePassed1 += 1;
            timeLeft1 = time1 - timePassed1;
            document.getElementById("timer-label1").innerHTML = showTime(timeLeft1);
        }
        else {
            document.getElementById("timer1").style.display = "none";
            images[1].style.visibility = "visible";
            primo = true;
        }

        if(timeLeft2>0) {
            timePassed2 += 1;
            timeLeft2 = time2 - timePassed2;
            document.getElementById("timer-label2").innerHTML = showTime(timeLeft2);
        }
        else {
            document.getElementById("timer2").style.display = "none";
            images[2].style.visibility = "visible";
            secondo = true;
        }

        if(timeLeft3>0) {
            timePassed3 += 1;
            timeLeft3 = time3 - timePassed3;
            document.getElementById("timer-label3").innerHTML = showTime(timeLeft3);
        }
        else {
            document.getElementById("timer3").style.display = "none";
            images[3].style.visibility = "visible";
            terzo = true;
            return;
        }

    }, 1000);
}


const back = document.getElementById("back");

back.addEventListener("click", () => {
    window.location = "./levels.php?tema="+tema;
});

function togglePopup() {
    var sol;
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var json = JSON.parse(xhr.responseText);
            var sol = json[tema][level-1];
            var input = document.getElementById ("answer-input");
            var answer = input.value.toUpperCase();
            
            const overlay = document.getElementById('popupOverlay');

            if (parseInt(level) == 12) {
                document.getElementById('prossimolvl').disabled = true;
            }
        
            if (sol.includes(answer)) {
                var xhr2 = new XMLHttpRequest(); 
                let post= "monete=";
                
                if (primo==false) {
                    document.getElementById("monetepopup").innerText= "Hai guadagnato 40 monete!";
                    post += "40";
                }
                else if (secondo == false) {
                    document.getElementById("monetepopup").innerText= "Hai guadagnato 20 monete!";
                    post += "20";
                }
                else if (terzo == false) {
                    document.getElementById("monetepopup").innerText= "Hai guadagnato 10 monete!";
                    post += "10";
                }
                else {
                    document.getElementById("monetepopup").innerText= "Hai guadagnato 5 monete!";
                    post += "5";
                }
                
                post += "&tema="+tema+"&livello="+level;

                xhr2.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {

                        overlay.classList.toggle('show');
                    }
                }
                
                xhr2.open("POST","../html/play.php",true);
                xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr2.send(post);
            }
            else {
                input.classList.add("apply-shake");
                input.value = "";
                
                input.addEventListener("animationend", () => {
                    input.classList.remove("apply-shake");
                });
            }
        }
    }

    xhr.open("GET", "../foto/Gioco/soluzioni.JSON", true);
    xhr.send();
}

function next () {
    window.location = "./play.php?tema="+tema+"&level=" + (parseInt(level)+1);
}