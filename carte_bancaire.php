<?php
session_start();

require_once('class/Config.php');
require('class/Adresse.php');
$adresse = new Adresse();
require('class/Carte.php');
$carte = new Carte();

if (isset($_POST['btncommande'])) {
    $carte->RegisterCarte(htmlspecialchars($_POST['numero_carte']), htmlspecialchars($_POST['nom_carte']), htmlspecialchars($_POST['mois_carte']), htmlspecialchars($_POST['annee_carte']), htmlspecialchars($_POST['cvv']), htmlspecialchars($_POST['enregistrer_carte']));
    $adresse->alerts();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Votre adresse</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
    <script src="js/dupliquer_adresse_facturation.js"></script>
    <script src="js/show_hide-CVV.js"></script>
</head>

<body>
    <div align="center">
        <form method="POST">
            <div class="container rounded bg-white mt-5 mb-5">
                <h1 class="h1form text-left border-bottom">Moyen de Paiement</h1>
                <div class="row">
                    <div class="border-right">
                        <div class="padd-3">
                            <h4 class="text-left padd-4">Ajouter votre carte</h4>

                            <div>
                                <label class="label titrelabel text-left">Numéro de la carte</label>
                                <input type="number" class="inputnum" id="numero_carte" name="numero_carte" minlength="16" maxlength="16" placeholder="Entrez votre nom et prénom" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Nom sur la carte</label>
                                <input type="text" class="inputtext" class="form-control" id="nom_carte" name="nom_carte" placeholder="Entrez votre numero de téléphone" required>
                            </div>


                            <div>
                                <label class="label titrelabel">Date d'expiration</label>
                                <div class="row">
                                    <select type="number" class="select" id="mois_carte" name="mois_carte" required>
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
                                    <select type="number" class="select" id="annee_carte" name="annee_carte" required>
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
                            </div>

                            <div>
                                <div>
                                    <label class="label titrelabel">Code de sécurité (CVV)</label>
                                    <input type="number" class="inputnum" minlength="3" maxlength="3" class="form-control" id="cvv" name="cvv" placeholder="Code CVV" required>
                                </div>
                                <div>
                                    <img class="imgeye" src="images/red_eye.png" id="eye" onclick="changer ()" />
                                </div>
                                <div> <input type="checkbox" id="enregistrer_carte" name="enregistrer_carte">
                                    <label for="enregistrer_carte">Enregistrer mes informations</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="error" id="errorname"></span></p>
                <button class="Buttoncommande" name="btncommande">Payer</button>
            </div>
        </form>