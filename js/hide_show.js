e= true;

function changer() {
    if (e) {
        document.getElementById("tab").style.display = 'block';
        document.getElementById("eye").src = "img/minus.png";
        e = false;
    } else {
        document.getElementById("tab").style.display = 'none';
        document.getElementById("eye").src = "img/plus.png";
        e = true;
    }
}
