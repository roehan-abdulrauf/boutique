// cette focntion me permet de pré_remplir la form livraison si le checkedbox est cocher

// je declare e comme true afin de pouvoir effacer les infos une fois la case décocher

e = true;

function afficher() {
    if (e) {
        // je declare d'abord dans une variable l'input a copier
        // puis je faire (value = var) pour coller la value du premier input dans le second
        var saisie1 = document.getElementById("nom_prenom").value;
        document.getElementById("nom_prenom_livr").value = saisie1;
        var saisie2 = document.getElementById("numero").value;
        document.getElementById("numero_livr").value = saisie2;
        var saisie3 = document.getElementById("adresse").value;
        document.getElementById("adresse_livr").value = saisie3;
        var saisie4 = document.getElementById("complement_adresse").value;
        document.getElementById("complement_adresse_livr").value = saisie4;
        var saisie5 = document.getElementById("code_postal").value;
        document.getElementById("code_postal_livr").value = saisie5;
        var saisie6 = document.getElementById("ville").value;
        document.getElementById("ville_livr").value = saisie6;
        e = false;
    } else {
        // dans le else je met des valeurs vide directement dans la value de l'input 2 lorsque le chekedbox est décocher
        document.getElementById("nom_prenom_livr").value = "";
        document.getElementById("numero_livr").value = "";
        document.getElementById("adresse_livr").value = "";
        document.getElementById("complement_adresse_livr").value = "";
        document.getElementById("code_postal_livr").value = "";
        document.getElementById("ville_livr").value = "";
        e = true;
    }
}
