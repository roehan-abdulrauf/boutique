<?php
// if ($_SESSION['id'] == NULL) {
//     echo 'vous devez vous connecter pour continuer';
// } else {
require_once './back/back_validation_de_commande.php';
// var_dump($_POST['code_postal']);
?>
<!DOCTYPE html>
<html>

<head>

    <title>Votre adresse</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="style2.css"/>
    <script src="js/dupliquer_adresse_facturation.js"></script>
    <script src="js/show_hide-CVV.js"></script>
    <script src="js/checkbox_disable"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php
        $view = new View;
        $view->headerStyle();
    ?>
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
                                <input type="text" class="inputtext" id="complement_adresse" name="complement_adresse" placeholder="Entrez votre Apt, suite, etage, nom de l'entreprise">
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
                                <input type="text" class="inputtext" id="complement_adresse_livr" name="complement_adresse_livr" placeholder="Entrez votre Apt, suite, etage, nom de l'entreprise">
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
                            <div> <input type="checkbox" id="checkbox1" name="checkbox1" class="checkbox-round" onClick="ckChange(this)" />
                                <label for="enregistrer_carte">Carte bancaire</label>
                            </div>
                            <div> <input type="checkbox" id="checkbox2" name="checkbox2" class="checkbox-round" onClick="ckChange(this)" />
                                <label for="enregistrer_carte">Paypal</label>
                                <p class="Ppaypal">Vous allez être redirigé vers notre page paypal</p>
                            </div>
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
                        <p>Total <span class="price" style="color:black"><b>$<?=$_SESSION['total'];?></b></span></p>
                    </div>
                </div>
                <span class="error" id="errorname"></span></p>
                <button class="Buttoncommande" name="btncommande">Continuer</button>
            </div>
        </form>
    </div>
</body>
<?php
// }
?>