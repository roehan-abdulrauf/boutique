<?php
// if ($_SESSION['id'] == NULL) {
//     echo 'vous devez vous connecter pour continuer';
// } else {
require_once './back/back_validation_de_commande.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Checkout example · Bootstrap v5.1</title>
  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">
  <link href="./assets/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="style2.css" rel="stylesheet">
  <script src="./assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./js/form-validation.js"></script>
  <script src="./js/dupliquer_adresse_facturation.js"></script>
  <script src="./js/show_hide-CVV.js"></script>
  <script src="./js/checkbox_disable"></script>
</head>

<body class="bg-light">
  <div class="container">
    <main>
      <div align="center">
        <div class="button-retour">
          <a id="retour-accueil" href="index.php"><span>Retour à l'accueil</span></a>
        </div>
      </div>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://zupimages.net/up/22/18/b7ab.png" alt="" width="252" height="45">
        <h2>Checkout</h2>
      </div>
      <div align="center">
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Adresse de facturation</h4>
          <form method="POST" class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="nom_prenom" class="form-label">Nom complet</label>
                <input type="text" class="form-control" id="nom_prenom" name="nom_prenom" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Vous devez saisir un nom valide.
                </div>
              </div>

              <div class="col-sm-6">
                <label for="numero" class="form-label">Numéro de téléphone</label>
                <input type="text" class="form-control" id="numero" name="numero" minlength="10" maxlength="10" placeholder="" value="" required>
                <div class="invalid-feedback">
                  Vous devez saisir un numéro de téléphone valide.
                </div>
              </div>

              <div class="col-12">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" class="form-control" id="adresse" name="adresse" placeholder="" required>
                <div class="invalid-feedback">
                  Entrez votre adresse postale valide.
                </div>

                <div class="col-12">
                  <label for="complement_adresse" class="form-label">Complement d'adresse <span class="text-muted">(facultatif)</span></label>
                  <input type="text" class="form-control" id="complement_adresse" name="complement_adresse" placeholder="">
                </div>
              </div>
              <div class="col-sm-6">
                <label for="ville" class="form-label">Ville</label>
                <input type="text" class="form-control" id="ville" name="ville" placeholder="" required>
              </div>
              <div class="col-sm-6">
                <label for="code_postal" class="form-label">Code postal</label>
                <input type="text" class="form-control" id="code_postal" name="code_postal" minlength="5" maxlength="5" placeholder="" required>
                <div class="invalid-feedback">
                  Code postal requis.
                </div>
              </div>

              <div>
                <input type="checkbox" id="adresse_factXlivr" name="adresse_factXlivr" onclick="afficher()"><label class="label">Utiliser comme adresse de livraison</label>
              </div>
              <br>
              <h4 class="mb-3">Adresse de livraison</h4>
              <form class="needs-validation" novalidate>
                <div class="row g-3">
                  <div class="col-sm-6">
                    <label for="nom_prenom_livr" class="form-label">Nom complet</label>
                    <input type="text" class="form-control" id="nom_prenom_livr" name="nom_prenom_livr" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Vous devez saisir un nom valide.
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="numero_livr" class="form-label">Numéro de téléphone</label>
                    <input type="text" class="form-control" id="numero_livr" name="numero_livr" minlength="10" maxlength="10" placeholder="" value="" required>
                    <div class="invalid-feedback">
                      Vous devez saisir un numéro de téléphone valide.
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="adresse_livr" class="form-label">Adresse</label>
                    <input type="text" class="form-control" id="adresse_livr" name="adresse_livr" placeholder="" required>
                    <div class="invalid-feedback">
                      Entrez votre adresse postale valide.
                    </div>

                    <div class="col-12">
                      <label for="complement_adresse_livr" class="form-label">Complement d'adresse <span class="text-muted">(Optionnel)</span></label>
                      <input type="text" class="form-control" id="complement_adresse_livr" name="complement_adresse_livr" placeholder="">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <label for="ville_livr" class="form-label">Ville</label>
                    <input type="text" class="form-control" id="ville_livr" name="ville_livr" placeholder="" required>

                  </div>
                  <div class="col-sm-6">
                    <label for="code_postal_livr" class="form-label">Code postal</label>
                    <input type="text" class="form-control" id="code_postal_livr" name="code_postal_livr" minlength="5" maxlength="5" placeholder="" required>
                    <div class="invalid-feedback">
                      Code postal requis.
                    </div>
                  </div>
                </div>

                <!-- <div class="form-check">
            <input type="checkbox" class="form-check-input" id="same-address">
            <label class="form-check-label" for="same-address">Shipping address is the same as my billing address</label>
          </div> -->
                <hr class="my-4">

                <h4 class="mb-3">Moyen de paiement</h4>
                
                <div class="my-3">
                 <p><strong><?= $_SESSION['total'];?> €</strong></p>
                  <div class="form-check">
                    <input type="checkbox" id="checkbox1" name="checkbox1" class="form-check-input" onClick="ckChange(this)">
                    <label class="form-check-label" for="credit">Carte bancaire</label>
                  </div>
                  <div class="form-check">
                    <input type="checkbox" id="checkbox2" name="checkbox2" type="radio" class="form-check-input" onClick="ckChange(this)">
                    <label class="form-check-label" for="paypal">PayPal</label>
                  </div>
                </div>
                <hr class="my-4">

                <button class="w-100 btn btn-primary btn-lg" name="btncommande" type="submit">Continuer</button>
              </form>
            </div>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2022 Iced Watches</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="index.php?page=aboutus">Qui sommes-nous</a></li>
        <li class="list-inline-item"><a href="index.php?page=page_contact">Contact</a></li>
      </ul>
    </footer>
  </div>
</body>

</html>