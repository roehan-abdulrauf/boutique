<?php
// require('config.php');
// require('User.php');

$home = new View;
$home -> headerStyle('Inscription');
?>

<!DOCTYPE html>
<html>

<head>
    <title> Page d'inscription</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <main>
        <div class="">
            <button><a href="index.php">Retour a l'Accueil</a></button>
        </div>
                <?php if (isset($_POST['inscription'])) {
                    $user = new User();
                    $user->Register(htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['mail']) , htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['codepostal']),htmlspecialchars($_POST['ville']),htmlspecialchars($_POST['password']), htmlspecialchars($_POST['passwordverify']));
                    $user->alerts();
                }
                ?>

        <div align="center">
        <form class="forms" action="connexion.php">
        <h1 class="titres">Bonjour</h1>
        <button type="submit" class="btn2" name="page de connexion">Se connecter</button>
        </form>
        </div>
        <hr>
        <div align="center">
            <form class="forms" method="POST">
                            <h1 class="titres">Je suis nouveau ici</h1>
                            <h4 class="input-inscription">Prénom*</h4>
                            <input class="input-field" type="text" name="prenom" placeholder="Entrez votre prénom" required>
                            <h4 class="input-inscription2">Nom*</h4>
                            <input class="input-field" type="text" name="nom" placeholder="Entrez votre nom" required>
                            <h4 class="input-inscription3">Adresse email*</h4>
                            <input class="input-field" type="email" name="mail" placeholder="Entrez votre adresse email" required>
                            <h4 class="input-inscription">Adresse*</h4>
                            <input class="input-field" type="text" name="adresse" placeholder="Entrez votre adresse" required>
                            <h4 class="input-inscription4">Code postal*</h4>
                            <input class="input-field" type="text" minlength="5" maxlength="5" name="codepostal" placeholder="Entrez votre code postal" required>
                            <h4 class="input-inscription5">Ville*</h4>
                            <input class="input-field" type="text" name="ville" placeholder="Entrez votre ville" required>
                            <h4 class="input-inscription6">Mot de passe*</h4>
                            <input class="input-field" type="password" name="password" placeholder="Entrez un mot de passe" required>
                            <h4 class="input-inscription7">Confirmation de mot de passe</h4>
                            <input class="input-field" type="password" name="passwordverify" placeholder="Confirmez le mot de passe" required>

                        <div align="center">
                            <button class="btn" type="submit" name="inscription">S'inscrire</button>
            </form>
        </div>
        <div align="center">
        <div class="space-between">
        <div class="conditions">
        Politique de confidentialité
        </div>
        <div class="conditions">
        Conditions d’utilisation
        </div>
        <div class="conditions">
        Mentions légales
        </div>
        </div>
        </div>
        <footer>
        <div>
            <p class=" ">Copyright ©2022 . Tous droits réservés.</p>
        </div>
                </footer>
    </main>
</body>

</html>