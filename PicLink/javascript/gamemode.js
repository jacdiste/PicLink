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
  let dots = document.getElementsByClassName("dot");
  if (n > themes.length) {themeIndex = 1}
  if (n < 1) {themeIndex = themes.length}
  for (i = 0; i < themes.length; i++) {
    themes[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  themes[themeIndex-1].style.display = "block";
}