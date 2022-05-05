<?php
require_once './back/back_carte_bancaire.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>Votre adresse</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
    <script src="js/dupliquer_adresse_facturation.js"></script>
    <script src="js/show_hide-CVV.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">

</head>

<body class="body-paiement">
    <div align="center">
        <div class="button-retour">
            <a id="retour-accueil" href="index.php?page=cart"><span>Retour au panier</span></a>
        </div>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-12">
                    <div class="card mx-auto">
                    <p><strong><?= $_SESSION['total'];?> €</strong></p>
                        <p class="heading">Paiement</p>
                        <img class="img-paiement" src="https://img.icons8.com/color/48/000000/visa.png" width="64px" height="60px" />
                        <img class="img-paiement" src="https://img.icons8.com/color/344/mastercard.png" width="64px" height="60px" />
                        <form class="card-details" method="POST">
                            <div class="form-group mb-0">
                                <p class="text-warning mb-0">Numéro de carte</p>
                                <input class="input-paiement" type="text" id="numero_carte" name="numero_carte" minlength="16" maxlength="16" placeholder="1234 5678 9012 3457" size="17" minlength="16" maxlength="16">
                            </div>

                            <div class="form-group">
                                <p class="text-warning mb-0">Nom de la carte</p> <input class="input-paiement" type="text" id="nom_carte" name="nom_carte" placeholder="Nom" size="17">
                            </div>
                            <div class="form-group pt-2">
                                <div class="row d-flex">
                                    <div class="col-sm-4">
                                        <p class="text-warning mb-0">Date d'expiration</p>
                                        <!-- <input type="text"  placeholder="MM/YYYY" size="7" id="mois_carte" name="mois_carte" minlength="7" maxlength="7"> -->
                                        <select type="number" placeholder="MM/YYYY" id="mois_carte" name="mois_carte" required>
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

                                            // cette boucle permet de pré-remplir le mois et l'année d'expiration

                                            $annee = date("Y"); // on l'annee en cours

                                            $an_dernier = $annee + 10;

                                            for ($i = $annee; $i <= $an_dernier; $i++) {

                                                echo '<option value="' . $i . '">' . $i . '</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <p class="text-warning mb-0">CVV</p>
                                        <input class="input-paiement" type="password" name="cvv" id="cvv" placeholder="&#9679;&#9679;&#9679;" size="1" minlength="3" maxlength="3">
                                    </div>
                                    <div>
                                        <img class="imgeye" src="images/red_eye.png" id="eye" width="40" onclick="changer ()" />
                                    </div>
                                </div>
                                <div class="col-sm-5 pt-0">
                                    <!-- <button class="Buttoncommande" name="btncommande">Payer</button> -->
                                    <button class="Buttoncommande" name="btncommande">Payer<i class="fas fa-arrow-right px-3 py-2"></i></button>
                                </div>
                                <?php if (isset($_SESSION['erreur'])) {
                                    echo $_SESSION['erreur'];
                                    unset($_SESSION['erreur']);
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>