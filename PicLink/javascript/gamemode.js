var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
  
    var data = JSON.parse(this.responseText);

    document.getElementById("user").innerText = data["username"];
    document.getElementById("money").innerText = data["money"];

    //slideshow temi

    if (sessionStorage.getItem("tema") == null) {
      sessionStorage.setItem("tema", "animali");
    }
    var temi = [ "animali", "arte", "anime"];
    var prezzo = [0, 200, 400];
    var tema = sessionStorage.getItem("tema");
    
    if (tema == "animali") themeIndex = 1;
    else if (tema == "arte") themeIndex = 2;
    else if (tema == "anime") themeIndex = 3;

    showThemes(themeIndex);

    parametroGET = location.search.substring(1).split('=')[0];

    if(parametroGET=='error'){
      togglePopup();
    }

    if(sessionStorage.getItem("newusername_error") == 1){
      togglePopup1();
    }

    var avatar = document.getElementById("avatar");
    var prev = document.getElementById("prev");
    var next = document.getElementById("next");
    var gioca = document.getElementById("gioca");
    var cancellaaccount = document.getElementById("cancellaaccount");
    var indietro_popup = document.getElementById("indietro_popup");
    var indietro_popup1 = document.getElementById("indietro_popup1");
    var indietro_popup2 = document.getElementById("indietro_popup2");
    var indietro_popup3 = document.getElementById("indietro_popup3");
    var lock = document.getElementById("lock");
    var unlock = document.getElementById("unlock");
    var sblocca = document.getElementsByClassName("bottone-sblocca");
    var cambiausername = document.getElementById("cambiausername");
    var cambiaemail = document.getElementById("cambiaemail");
    var cambiapassword = document.getElementById("cambiapassword");

    avatar.addEventListener("click", () => {
      toggleDropdown();
    });

    prev.addEventListener("click", () => {
      plusThemes(-1);
      sessionStorage.setItem("tema",tema);
    });

    next.addEventListener("click", () => {
      plusThemes(1);
      sessionStorage.setItem("tema",tema);
    });

    gioca.addEventListener("click", () => {
      window.location = "./levels.php?tema="+tema;
    });

    cancellaaccount.addEventListener("click", () => {
      togglePopup();
      toggleDropdown();
    });

    indietro_popup.addEventListener("click", () => {
      location.href = "./gamemode.php";
    });

    indietro_popup1.addEventListener("click", () => {
      togglePopup1();
      location.href = "./gamemode.php";
    });

    indietro_popup2.addEventListener("click", () => {
      togglePopup2();
    });

    indietro_popup3.addEventListener("click", () => {
      location.href = "./gamemode.php";
    });

    cambiausername.addEventListener("click", () => {
      togglePopup1();
      toggleDropdown();
    });

    cambiaemail.addEventListener("click", () => {
      togglePopup2();
      toggleDropdown();
    });

    cambiapassword.addEventListener("click", () => {
      togglePopup3();
      toggleDropdown();
    });

    lock.addEventListener("click", () => {
      myFunction();
    });

    unlock.addEventListener("click", () => {
      myFunction();
    });

    
    for (let i=0; i<sblocca.length; i++) {
      sblocca[i].addEventListener("click", (event) => {
        var xhr2 = new XMLHttpRequest();
        var post = "costo="+prezzo[i]+"&tema="+tema;

        xhr2.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("sblocca-"+tema).style.display = "none";
            document.getElementById("gioca").disabled = false;
            document.getElementById("foto"+tema).style.filter = "brightness(0.9)";
            window.location = "./gamemode.php";
          }
        }

        xhr2.open("POST","../php/sblocca.php",true);
        xhr2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr2.send(post);
      });
    }

    // Next/previous controls
    function plusThemes(n) {
      showThemes(themeIndex += n);
    }

    // Thumbnail image controls
    function currentTheme(n) {
      showThemes(themeIndex = n);
    }

    function showThemes(n) {
      let i;
      let themes = document.getElementsByClassName("theme");
      if (n > themes.length) {themeIndex = 1}
      if (n < 1) {themeIndex = themes.length}
      for (i = 0; i < themes.length; i++) {
        themes[i].style.display = "none";
      }
      tema = temi[themeIndex-1];

      if (data[tema] == "f" ) {
        document.getElementById("gioca").disabled = true;
        if ((parseInt(data["money"])) < prezzo[themeIndex-1]) {
          document.getElementById("span-"+tema).innerText = "Non hai abbastanza monete";
          document.getElementById("bottone-sblocca-"+tema).disabled = true;
        }
      }
      else {
        document.getElementById("sblocca-"+tema).style.display = "none";
        document.getElementById("gioca").disabled = false;
        document.getElementById("foto"+tema).style.filter = "brightness(0.9)";
      }

      themes[themeIndex-1].style.display = "block";
    }

    function toggleDropdown() {
      const dropdown = document.querySelector(".dropdown");
      if (dropdown.style.display === "none" || dropdown.style.display === "") {
          dropdown.style.display = "block";
      } else {
          dropdown.style.display = "none";
      }
    }
    
    function togglePopup() { 
      const overlay = document.getElementById('popupOverlay'); 
      overlay.classList.toggle('show'); 
    }

    function togglePopup1() { 
      const overlay = document.getElementById('popupOverlay1');
      overlay.classList.toggle('show'); 
    }

    function togglePopup2() { 
      const overlay = document.getElementById('popupOverlay2'); 
      overlay.classList.toggle('show'); 
    }

    function togglePopup3() { 
      const overlay = document.getElementById('popupOverlay3'); 
      overlay.classList.toggle('show'); 
    }

    function myFunction() {
      var password = document.getElementById("password");
      var lock = document.getElementById("lock");
      var unlock = document.getElementById("unlock");

      if (password.type === "password") {
        lock.style.display="none";
        unlock.style.display="initial";
        password.type = "text";
      } else {
        lock.style.display="initial";
        unlock.style.display="none";
        password.type = "password";
      }
    }
  }
}

xhr.open("GET", "../php/database-call.php", true);
xhr.send();





