//BUTTONS
const bottoni=document.getElementById("bottoni");
bottoni.addEventListener("click",(event) => {
    if(event.target.name=="Login") {
        window.location="./html/login.html";
    }
    else if (event.target.name=="Registration") {
        window.location="./html/register.html";
    }
    else {
        return;
    }
});
