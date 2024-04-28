//slideshow temi
let themeIndex = 1;
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