<?php
// session_start();
// require('config.php');
// require('User.php');
$home = new View;
$home -> headerStyle('Connexion');
?>
<!-- <!DOCTYPE html>
<html>

<head>
    <title> Page de connexion</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Style.css" /> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body> -->
<main>
        <div align="center">
            <form class="forms" method="POST">
                <?php if (isset($_POST['connexion'])) {
                    $user = new User();
                    $user->Connect(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['password']));
                    $_SESSION['id'] = $user->getId();
                    $_SESSION['mail'] = $user->getMail();
                    $_SESSION['prenom'] = $user->getPrenom();
                    $_SESSION['nom'] = $user->getNom();
                    $_SESSION['adresse'] = $user->getAdresse();
                    $_SESSION['code_postal'] = $user->getCodepostal();
                    $_SESSION['ville'] = $user->getVille();
                    $user->alerts();
                    var_dump( $_SESSION['id']);
                }
                ?>

                            <h1 class="titres">Bonjour</h1>
                            <h4 class="input-connexion">Adresse email</h4>
                            <div class="input-icons">
                            <i class="fas fa-envelope icon"></i>
                            <input class="input-field" type="email" name="mail" placeholder="Adresse email" required >
                            </div>
                            <div class="espace">
                            <h4 class="input-connexion2">Mot de passe</h4>
                            </div>
                            <div class="input-icons">
                            <i class="fas fa-key icon"></i>
                            
                            <input class="input-field" type="password" name="password" placeholder="Mot de passe" required> 
                            </div>
                            <button type="submit" class="btn" name="connexion">Se connecter</button>
            
            </form>
        </div>
    </main>
        <hr>
        <div align="center">
        <form class="forms" action="inscription.php">
        <h1 class="titres">Je suis nouveau ici</h1>
        <button type="submit" class="btn2" name="page d'inscription">S'inscrire</button>
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
<!-- </body> -->

</html>