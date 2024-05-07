function togglePopup() { 
    const overlay = document.getElementById('popupOverlay'); 
    if(document.getElementById('answer-input').value == "COLOSSEO") {
        overlay.classList.toggle('show'); 
    }
    else {
        alert("Si na latrin");
    }
} 