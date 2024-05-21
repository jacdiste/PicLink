//slideshow temi
let themeIndex = 1;
var temi = [ "animali", "arte", "anime"];
var tema= temi[0];
showThemes(themeIndex);
    
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

function gioca() {
  window.location = "./levels.html?tema="+tema;
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