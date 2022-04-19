<?php
session_start();

require_once('Config.php');
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
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <script src="js/dupliquer_adresse_facturation.js"></script>
    <script src="js/show_hide-CVV.js"></script>
</head>

<body>
    <div align="center">
        <form method="POST">
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Adresse de facturation</h4>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Nom complet</label><input type="text" class="form-control" id="nom_prenom" name="nom_prenom" placeholder="Entrez votre nom et prénom" required></div>
                                <div class="col-md-12"><label class="labels">Numero</label><input type="number" minlength="5" maxlength="5" class="form-control" id="numero" name="numero" placeholder="Entrez votre numero de téléphone" required></div>
                                <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control" id="adresse" name="adresse" placeholder="Entrez votre adresse" required></div>
                                <div class="col-md-12"><label class="labels">Complement d'adresse (facultatif)</label><input type="text" class="form-control" id="complement_adresse" name="complement_adresse" placeholder="Entrez votre Apt, suite, etage, nom de l'entreprise" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Ville</label><input type="text" class="form-control" id="ville" name="ville" placeholder="Entrez votre ville" required></div>
                                <div class="col-md-6"><label class="labels">Code postal</label><input type="number" class="form-control" id="code_postal" name="code_postal" placeholder="Entrez votre code postal" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><input type="checkbox" id="adresse_factXlivr" name="adresse_factXlivr" onclick="afficher()"><label class="labels">Utiliser comme adresse de livraison</label></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Adresse de livraison</h4>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Nom complet</label><input type="text" class="form-control" id="nom_prenom_livr" name="nom_prenom_livr" placeholder="Entrez votre nom et prénom" required></div>
                                <div class="col-md-12"><label class="labels">Numero</label><input type="number" minlength="5" maxlength="5" class="form-control" id="numero_livr" name="numero_livr" placeholder="Entrez votre numero de téléphone" required></div>
                                <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control" id="adresse_livr" name="adresse_livr" placeholder="Entrez votre adresse" required></div>
                                <div class="col-md-12"><label class="labels">Complement d'adresse (facultatif)</label><input type="text" class="form-control" id="complement_adresse_livr" name="complement_adresse_livr" placeholder="Entrez votre Apt, suite, etage, nom de l'entreprise" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Ville</label><input type="text" class="form-control" id="ville_livr" name="ville_livr" placeholder="Entrez votre ville" required></div>
                                <div class="col-md-6"><label class="labels">Code postal</label><input type="number" class="form-control" id="code_postal_livr" name="code_postal_livr" placeholder="Entrez votre code postal" required></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Ajouter votre carte</h4>
                            </div>

                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Numéro de la carte</label><input type="number" class="form-control" id="numero_carte" name="numero_carte" placeholder="Entrez votre nom et prénom" required></div>
                                <div class="col-md-12"><label class="labels">Nom sur la carte</label><input type="text" minlength="5" maxlength="5" class="form-control" id="nom_carte" name="nom_carte" placeholder="Entrez votre numero de téléphone" required></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Date d'expiration</label>
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
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Code de sécurité (CVV)</label><input type="number" class="form-control" minlength="5" maxlength="5" class="form-control" id="cvv" name="cvv" placeholder="Code CVV" required></div>
                                <div class="col-md-6"> <img class="imgeye" src="images/red_eye.png" id="eye" onclick="changer ()" /> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="error" id="errorname"></span></p>
            <div>
                <button id="paypal" onclick="checkvalue()">Payer via paypal</button>
            </div>

            <button name="btncommande">Passer ma commande</button>
            <?php
            // }else{}
            ?>
        </form>
    </div>
</body>