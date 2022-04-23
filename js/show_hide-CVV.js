// cette focntion me permet d'afficher le code cvv

// je declare e comme true afin de pouvoir masquer et afficher le code

e = true;

function changer() {
    if (e) {
        document.getElementById("cvv").setAttribute("type", "text");
        document.getElementById("eye").src = "img/hideeye";
        e = false;
    } else {
        document.getElementById("cvv").setAttribute("type", "password");
        document.getElementById("eye").src = "img/showeye";
        e = true;
    }
}