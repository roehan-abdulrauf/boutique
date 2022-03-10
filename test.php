<?php
session_start();
require_once 'Config.php';
require('Adresse.php');
$adresse = new Adresse();
require('Carte.php');
$carte = new Carte();
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
        <?php if (isset($_POST['btncommande'])) {
            $adresse->AdresseFacturation(htmlspecialchars($_POST['nom_prenom']), htmlspecialchars($_POST['numero']), htmlspecialchars($_POST['adresse']), htmlspecialchars($_POST['complement_adresse']), htmlspecialchars($_POST['code_postale']), htmlspecialchars($_POST['ville']), htmlspecialchars($_POST['adresse_factXlivr']));
            $adresse->AdresseLivraison(htmlspecialchars($_POST['nom_prenom_livr']), htmlspecialchars($_POST['numero_livr']), htmlspecialchars($_POST['adresse_livr']), htmlspecialchars($_POST['complement_adresse_livr']), htmlspecialchars($_POST['code_postale_livr']), htmlspecialchars($_POST['ville_livr']));
            $carte->RegisterCarte(htmlspecialchars($_POST['numero_carte']), htmlspecialchars($_POST['nom_carte']), htmlspecialchars($_POST['mois_carte']), htmlspecialchars($_POST['annee_carte']), htmlspecialchars($_POST['cvv']), htmlspecialchars($_POST['enregistrer_carte']));
            $adresse->alerts();
        }

        if (isset($_GET['facturation'])) {
            
        ?>

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
                    <input type="text" id="complement_adesse" name="complement_adresse" placeholder="Apt, suite, etage, nom de l'entreprise">
                </div>

                <div> <label for="code_postale">Code postale</label>
                    <input type="text" id="code_postale" name="code_postale" required>
                </div>

                <div><label for="ville">Ville</label>
                    <input type="text" id="ville" name="ville" required>
                </div>

                <div> <input type="checkbox" id="adresse_factXlivr" name="adresse_factXlivr">
                    <label for="adresse_factXlivr">Utiliser comme adresse de livraison</label>
                </div>
                <input type="submit" id="facturation" name="facturation" required>
            </section>
<?php
if(!isset($_POST['adresse_factXlivr'])){
    header('location: test.php?page=livraison ');
}else{
    header('location: test.php?page=paiement');
}
        } elseif (isset($_GET['livraison'])) {
        ?>
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
                    <input type="text" id="complement_adesse_livr" name="complement_adresse_livr" placeholder="Apt, suite, etage, nom de l'entreprise">
                </div>

                <div><label for="code_postale_livr">Code postale</label>
                    <input type="text" id="code_postale_livr" name="code_postale_livr" required>
                </div>

                <div> <label for="ville_livr">Ville</label>
                    <input type="text" id="ville_livr" name="ville_livr" required>
                </div>

                <input type="submit" id="livraison" name="livraion" required>
            </section>
            <?php
        } elseif (isset($_GET['paiement'])) {
        ?>
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

                        $annee = date("Y"); // tu recupere l'nnee en cours

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
                        e = true;

                        function changer() {
                            if (e) {
                                document.getElementById("cvv").setAttribute("type", "text");
                                document.getElementById("eye").src = "https://zupimages.net/up/22/10/tz7t.png";
                                e = false;
                            } else {
                                document.getElementById("cvv").setAttribute("type", "password");
                                document.getElementById("eye").src = "https://zupimages.net/up/22/10/g665.png";
                                e = true;
                            }
                        }
                    </script>
                </div>

                <div> <input type="checkbox" id="enregistrer_carte" name="enregistrer_carte">
                    <label for="enregistrer_carte">Enregistrer mes informations</label>
                </div>
            </section>
            <div>
                <h1><a href="paypal.php" target="_blank">Payer via paypal</a></h1>
            </div>

            <button name="btncommande">Passer ma commande</button>
        <?php
        }
        ?>
    </form>