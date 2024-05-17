//BUTTONS
const bottoni=document.getElementById("bottoni");
bottoni.addEventListener("click",(event) => {
    if(event.target.name=="Login") {
        window.location="./html/login.php";
    }
    else if (event.target.name=="Registration") {
        window.location="./html/register.php";
    }
    else {
        return;
    }
});
