var xhr = new XMLHttpRequest();

xhr.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
  
    var data = JSON.parse(this.responseText);

    //slideshow temi
    let themeIndex = 1;
    var temi = [ "animali", "arte", "anime"];
    var tema= temi[0];
    showThemes(themeIndex);

    var parametroGET = window.location.search.substring(1); 
    parametroGET = parametroGET.split('=')[0];
    console.log(parametroGET);
    if(parametroGET=='error'){
      togglePopup();
    }

    var avatar = document.getElementById("avatar");
    var prev = document.getElementById("prev");
    var next = document.getElementById("next");
    var gioca = document.getElementById("gioca");
    var cancellaaccount = document.getElementById("cancellaaccount");
    var indietro_cancellaaccount = document.getElementById("indietro_cancellaaccount");
    var lock = document.getElementById("lock");
    var unlock = document.getElementById("unlock");

    avatar.addEventListener("click", () => {
      toggleDropdown();
    });

    prev.addEventListener("click", () => {
      plusThemes(-1);
    });

    next.addEventListener("click", () => {
      plusThemes(1);
    });

    gioca.addEventListener("click", () => {
      window.location = "./levels.php?tema="+tema;
    });

    cancellaaccount.addEventListener("click", () => {
      togglePopup();
      toggleDropdown();
    });

    indietro_cancellaaccount.addEventListener("click", () => {
      togglePopup();
      window.location = "./gamemode.php";
    });

    lock.addEventListener("click", () => {
      myFunction();
    });

    unlock.addEventListener("click", () => {
      myFunction();
    });

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
        
      }

      else {
        document.getElementById("sblocca-"+tema).style.display = "none";
        document.getElementById("gioca").disabled = false;
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





