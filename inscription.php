<?php

// require('config.php');
// require('User.php');



?>


<!-- <!DOCTYPE html>
<html>

<head>
    <title> Page d'inscription</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head> -->


        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title>Inscription</title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
            </head>
            
<body id="bodyform">
    <?php
        $home = new View;
        $home -> headerStyle();
    ?>
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
        <form class="forms" method="POST" action="./back/back_inscription.php">
        <h1 class="titres">Bonjour</h1>
        <button type="submit" class="btn2" name="pageDeConnexion">Se connecter</button>
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
        
    </main>

    <?php
    $home->footerStyle()
    ?>
</body>

</html>