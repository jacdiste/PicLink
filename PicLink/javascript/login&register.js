//gestione lucchetto "mostra password"
function myFunction() {
    var password = document.getElementById("password");
    var lock = document.getElementById("lock");
    var unlock = document.getElementById("unlock");
    
    if (password.type === "password") {
      lock.style.display="none";
      unlock.style.display="block";
      password.type = "text";
    } else {
      lock.style.display="block";
      unlock.style.display="none";
      password.type = "password";
    }
  }
