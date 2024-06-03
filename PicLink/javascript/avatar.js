const bottoni=document.getElementsByClassName("bottone");

var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        var data = JSON.parse(this.responseText);

        var listasbloccati = data["avatar"];
        listasbloccati = listasbloccati.substring(1,listasbloccati.length-1);
        listasbloccati = listasbloccati.split(",");

        var avatarbox = document.getElementsByClassName("avatarbox");
        var avatar = document.getElementsByClassName("avatar");
        var overlay = document.getElementsByClassName("overlay");
        var prezzo = document.getElementsByClassName("prezzo");
        var back = document.getElementById("back");
        var prezzi = [0, 40, 40, 40, 80, 80, 80, 80, 100, 100, 120, 120];

        back.addEventListener("click", () => {
            window.location = "./gamemode.php";
        });

        for (let i=0; i<avatar.length; i++) {
            var src= avatar[i].src.split('/');
            var srcavatar = src[src.length - 1];
            var avatarindex;
            if (srcavatar == data["avatarscelto"]) {
                avatarindex = i;
                avatar[i].disabled = true;
                avatar[i].style.outline = "4px solid white";
            }

            if (listasbloccati[i] == "f") {
                avatar[i].style.filter = "brightness(0.3)";

                prezzo[i-1].innerText = prezzi[i];

                avatarbox[i-1].addEventListener("mouseover", () => {
                    overlay[i-1].style.opacity = 1;
                });

                avatarbox[i-1].addEventListener("mouseout", () => {
                    overlay[i-1].style.opacity = 0;
                });

                if (data["money"] < prezzi[i]) {
                    avatarbox[i-1].style.cursor = "default";
                }

                else {
                    avatarbox[i-1].addEventListener("click", (event) => {
                        var post2 = "costo="+prezzi[i]+"&avatar="+(i+1)+".png&indice="+(i+1);
                        var xhr2 = new XMLHttpRequest();
                        xhr2.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                overlay[i-1].style.visibility = "hidden";
                                avatar[i].style.filter = "brightness(0.9)";
                                window.location = "./avatar.php?"+post2;
                            }
                        };
                        xhr2.open("POST","../php/compraavatar.php",true);
                        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr2.send(post2);
                    });
                }
            }
            else {
                if (i==0) {
                    avatar[0].addEventListener("click", (event) => {
                        var xhr3 = new XMLHttpRequest();
                        var post3 = "avatar=1.png";
                        xhr3.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                avatar[i].disabled = true;
                                avatar[i].style.outline = "4px solid white";

                                avatar[avatarindex].disabled = false;
                                avatar[avatarindex].style.outline = "none";
                                avatarindex = i;
                            }
                        }
                        xhr3.open("POST","../php/selezionaavatar.php",true);
                        xhr3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr3.send(post3);
                    });
                }
                else {
                    avatarbox[i-1].addEventListener("click", (event) => {
                        var xhr4 = new XMLHttpRequest();
                        var post4 = "avatar="+(i+1)+".png";
                        xhr4.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                avatar[i].disabled = true;
                                avatar[i].style.outline = "4px solid white";

                                avatar[avatarindex].disabled = false;
                                avatar[avatarindex].style.outline = "none";

                                avatarindex = i;
                            }
                        }
                        xhr4.open("POST","../php/selezionaavatar.php",true);
                        xhr4.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xhr4.send(post4);
                    });
                }
            }
        }
    }
}

xhr.open("GET", "../php/database-call.php", true);
xhr.send();
