<?php
// session_start();

require_once('class/Config.php');
require('class/Adresse.php');
$adresse = new Adresse();
require('class/Carte.php');
$carte = new Carte();

if (isset($_POST['btncommande'])) {
    $adresse->AdresseFacturation(htmlspecialchars($_POST['nom_prenom']), htmlspecialchars($_POST['numero']), htmlspecialchars($_POST['adresse']), htmlspecialchars($_POST['complement_adresse']), htmlspecialchars($_POST['code_postal']), htmlspecialchars($_POST['ville']));
    $adresse->AdresseLivraison(htmlspecialchars($_POST['nom_prenom_livr']), htmlspecialchars($_POST['numero_livr']), htmlspecialchars($_POST['adresse_livr']), htmlspecialchars($_POST['complement_adresse_livr']), htmlspecialchars($_POST['code_postal_livr']), htmlspecialchars($_POST['ville_livr']));
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
                <h1 class="h1form text-left border-bottom">Adresse</h1>
                <div class="row">
                    <div class="border-right">
                        <div class="padd-3">
                            <h4 class="h4form text-left padd-4">Adresse de facturation</h4>
                            <div>
                                <label class="label titrelabel">Nom complet</label>
                                <input type="text" class="inputtext" id="nom_prenom" name="nom_prenom" placeholder="Entrez votre nom et prénom" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Numero</label>
                                <input type="number" class="inputnum" id="numero" name="numero" minlength="12" maxlength="12" placeholder="Entrez votre numero de téléphone" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Adresse</label>
                                <input type="text" class="inputtext" id="adresse" name="adresse" placeholder="Entrez votre adresse" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Complement d'adresse (facultatif)</label>
                                <input type="text" class="inputtext" id="complement_adresse" name="complement_adresse" placeholder="Entrez votre Apt, suite, etage, nom de l'entreprise" required>
                            </div>
                            <div class="row">
                                <div><label class="label titrelabel">Ville</label>
                                    <input type="text" class="inputtext1" id="ville" name="ville" placeholder="Entrez votre ville" required>
                                </div>
                                <div><label class="label titrelabel">Code postal</label>
                                    <input type="number" class="inputnum1" id="code_postal" name="code_postal" minlength="5" maxlength="5" placeholder="Entrez votre code postal" required>
                                </div>
                            </div>
                            <div>
                                <input type="checkbox" id="adresse_factXlivr" name="adresse_factXlivr" onclick="afficher()"><label class="label">Utiliser comme adresse de livraison</label>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="padd-3">
                            <h4 class="h4form text-left padd-4">Adresse de livraison</h4>
                            <div>
                                <label class="label titrelabel">Nom complet</label>
                                <input type="text" class="inputtext" id="nom_prenom_livr" name="nom_prenom_livr" placeholder="Entrez votre nom et prénom" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Numero</label>
                                <input type="number" class="inputnum" id="numero_livr" name="numero_livr" minlength="12" maxlength="12" placeholder="Entrez votre numero de téléphone" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Adresse</label>
                                <input type="text" class="inputtext" id="adresse_livr" name="adresse_livr" placeholder="Entrez votre adresse" required>
                            </div>
                            <div>
                                <label class="label titrelabel">Complement d'adresse (facultatif)</label>
                                <input type="text" class="inputtext" id="complement_adresse_livr" name="complement_adresse_livr" placeholder="Entrez votre Apt, suite, etage, nom de l'entreprise" required>
                            </div>
                            <div class="row">
                                <div>
                                    <label class="label titrelabel">Ville</label>
                                    <input type="text" class="inputtext1" id="ville_livr" name="ville_livr" placeholder="Entrez votre ville" required>
                                </div>
                                <div>
                                    <label class="label titrelabel">Code postal</label>
                                    <input type="number" class="inputnum1" id="code_postal_livr" name="code_postal_livr" minlength="5" maxlength="5" placeholder="Entrez votre code postal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
                            <button class="Buttonpaypal" id="paypal" onclick="checkvalue()">Payer via paypal</button>
                            <p class="Ppaypal">Vous allez être redirigé vers notre page paypal pour finaliser votre paiement</p>
                        </div>
                    </div>
                    <div class="padd-3">
                        <h4>Cart
                            <span class="price" style="color:black">
                                <i class="fa fa-shopping-cart"></i>
                                <b>4</b>
                            </span>
                        </h4>
                        <p>Livraison Gratuite</p>
                        <hr>
                        <p>Total <span class="price" style="color:black"><b>$30</b></span></p>
                    </div>
                </div>
                <span class="error" id="errorname"></span></p>
                <button class="Buttoncommande" name="btncommande">Passer ma commande</button>
            </div>
            <input type="checkbox" class="checkbox-round" />
        </form>

</body><