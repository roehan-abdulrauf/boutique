<?php
session_start();

require_once ('Config.php');
require('Adresse.php');
$adresse = new Adresse();
require('Carte.php');
$carte = new Carte();

if (isset($_POST['btncommande'])) {
    $adresse->AdresseFacturation(htmlspecialchars($_POST['nom_prenom']), htmlspecialchars($_POST['numero']), htmlspecialchars($_POST['adresse']), htmlspecialchars($_POST['complement_adresse']), htmlspecialchars($_POST['code_postale']), htmlspecialchars($_POST['ville']));
    $adresse->AdresseLivraison(htmlspecialchars($_POST['nom_prenom_livr']), htmlspecialchars($_POST['numero_livr']), htmlspecialchars($_POST['adresse_livr']), htmlspecialchars($_POST['complement_adresse_livr']), htmlspecialchars($_POST['code_postale_livr']), htmlspecialchars($_POST['ville_livr']));
    $carte->RegisterCarte(htmlspecialchars($_POST['numero_carte']), htmlspecialchars($_POST['nom_carte']), htmlspecialchars($_POST['mois_carte']), htmlspecialchars($_POST['annee_carte']), htmlspecialchars($_POST['cvv']), htmlspecialchars($_POST['enregistrer_carte']));
    $adresse->alerts();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Votre adresse</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">
        <section>
            <div>
                <h1>Adresse de facturation</h1>
                <label for="nom_prenom">Nom complet</label>
                <input type="text" id="nom_prenom" name="nom_prenom" required>
            </div>

            <div> <label for="numero">Numero</label>
                <input type="tel" id="numero" name="numero" required>
            </div>

            <div> <label for="adresse">Adresse</label>
                <input type="text" id="adresse" name="adresse" required>
            </div>

            <div> <label for="complement_adesse">Complement d'adresse (facultatif)</label>
                <input type="text" id="complement_adresse" name="complement_adresse" placeholder="Apt, suite, etage, nom de l'entreprise">
            </div>

            <div> <label for="code_postale">Code postale</label>
                <input type="text" id="code_postale" name="code_postale" required>
            </div>

            <div><label for="ville">Ville</label>
                <input type="text" id="ville" name="ville" required>
            </div>

            <div> <input type="checkbox" id="adresse_factXlivr" name="adresse_factXlivr" onclick="afficher()">
                <label for="adresse_factXlivr">Utiliser comme adresse de livraison</label>
            </div>
        </section>
        <script>
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
                    var saisie5 = document.getElementById("code_postale").value;
                    document.getElementById("code_postale_livr").value = saisie5;
                    var saisie6 = document.getElementById("ville").value;
                    document.getElementById("ville_livr").value = saisie6;
                    e = false;
                } else {
                    // dans le else je met des valeurs vide directement dans la value de l'input 2 lorsque le chekedbox est décocher
                    document.getElementById("nom_prenom_livr").value="";
                    document.getElementById("numero_livr").value="";
                    document.getElementById("adresse_livr").value="";
                    document.getElementById("complement_adresse_livr").value="";
                    document.getElementById("code_postale_livr").value="";
                    document.getElementById("ville_livr").value="";
                    e = true;
                }
            }
        </script>

        <section>
            <div>
                <h1>Adresse de livraison</h1>
                <label for="nom_prenom_livr">Nom complet</label>
                <input type="text" id="nom_prenom_livr" name="nom_prenom_livr" required>
            </div>

            <div> <label for="numero_livr">Numero</label>
                <input type="tel" id="numero_livr" name="numero_livr" required>
            </div>

            <div><label for="adresse_livr">Adresse</label>
                <input type="text" id="adresse_livr" name="adresse_livr" required>
            </div>

            <div> <label for="complement_adesse_livr">Complement d'adresse (facultatif)</label>
                <input type="text" id="complement_adresse_livr" name="complement_adresse_livr" placeholder="Apt, suite, etage, nom de l'entreprise">
            </div>

            <div><label for="code_postale_livr">Code postale</label>
                <input type="text" id="code_postale_livr" name="code_postale_livr" required>
            </div>

            <div> <label for="ville_livr">Ville</label>
                <input type="text" id="ville_livr" name="ville_livr" required>
            </div>
        </section>

        <section>
            <div>
                <h1>Ajouter votre carte</h1>
                <label for="numero_carte">Numéro de la carte</label>
                <input type="text" id="numero_carte" name="numero_carte" minlength="16" maxlength="16" required>
            </div>

            <div><label for="nom_carte">Nom sur la carte</label>
                <input type="text" id="nom_carte" name="nom_carte" required>
            </div>

            <div>
                <label for="date_carte">Date d'expiration</label>
                <select type="number" id="mois_carte" name="mois_carte" required>
                    <option> 01 Janvier</option>
                    <option> 02 Février</option>
                    <option> 03 Mars</option>
                    <option> 04 Avril</option>
                    <option> 05 Mai</option>
                    <option> 06 Juin</option>
                    <option> 07 Juillet</option>
                    <option> 08 Aaout</option>
                    <option> 09 Septembre</option>
                    <option> 10 Octobre</option>
                    <option> 11 Novembre</option>
                    <option> 12 Décembre</option>
                </select>
                <select type="number" id="annee_carte" name="annee_carte" required>

                    <?php

                    // cette fonction me permet de pré_remplir le mois et l'annee d'expiration

                    $annee = date("Y"); // tu recupere l'annee en cours

                    $an_dernier = $annee + 10;

                    for ($i = $annee; $i <= $an_dernier; $i++) {

                        echo '<option value="' . $i . '">' . $i . '</option>';
                    }

                    ?>

                </select>
            </div>

            <div>
                <label for="cvv">Code de sécurité (CVV)</label>
                <input type="password" id="cvv" name="cvv" minlength="3" maxlength="3" required>
                <img src="images/red_eye.png" id="eye" onclick="changer ()" />
                <script>
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
                </script>
            </div>

            <div> <input type="checkbox" id="enregistrer_carte" name="enregistrer_carte">
                <label for="enregistrer_carte">Enregistrer mes informations</label>
            </div>
        </section>
        <script>
            // cette fonction me permet de faire les verification necessaire avant de rediriger vers le moyen de paiement paypal
            function checkvalue() {
                //  je crée toutes les varibale nécessaire a la verification
                var numero_carte = document.getElementById("numero_carte").value;
                nom_carte = document.getElementById("nom_carte").value;
                cvv = document.getElementById("cvv").value;
                nom_prenom = document.getElementById("nom_prenom").value;
                numero = document.getElementById("numero").value;
                adresse = document.getElementById("adresse").value;
                code_postale = document.getElementById("code_postale").value;
                ville = document.getElementById("ville").value;
                nom_prenom_livr = document.getElementById("nom_prenom_livr").value;
                numero_livr = document.getElementById("numero_livr").value;
                adresse_livr = document.getElementById("adresse_livr").value;
                code_postale_livr = document.getElementById("code_postale_livr").value;
                ville_livr = document.getElementById("ville_livr").value;
                // je verifie d'abord que tous les champs du formumaire adresse facturation sont remplir 
                if (nom_prenom.match(/\S/) && numero.match(/\S/) && adresse.match(/\S/) && code_postale.match(/\S/) && ville.match(/\S/)) {
                    //    je verifie ensuite que tous les champs du formulaire adresse livraison sont remplir
                    if (nom_prenom_livr.match(/\S/) && numero_livr.match(/\S/) && adresse_livr.match(/\S/) && code_postale_livr.match(/\S/) && ville_livr.match(/\S/)) {
                        //    puis je verifie enfin que le formulaire de carte bancaire n'est pas été déja remplir 
                        if (!numero_carte.match(/\S/) && !nom_carte.match(/\S/) && !cvv.match(/\S/)) {
                            alert('Vous allez etre redirigé vers paypal');
                            // document.location.href="paypal.php"
                            window.open('paypal.php', '_blank');
                        } else {
                            // alert('Vous allez etre redirigé vers paypal');
                            document.getElementById('errorname').innerHTML = "Vous avez déjà renseigner votre carte bancaire!!";
                        }
                    } else {
                        document.getElementById('errorname').innerHTML = "Veuillez entrez remplir tous les champs de l'adresse livraison";
                    }
                } else {
                    document.getElementById('errorname').innerHTML = "Veuillez entrez remplir tous les champs de l'adresse facturation";
                }
            }
        </script>
        <span class="error" id="errorname"></span></p>
        <div>
            <button id="paypal" onclick="checkvalue()">Payer via paypal</button>
        </div>

        <button name="btncommande">Passer ma commande</button>
        <?php
        // }else{}
        ?>
    </form>