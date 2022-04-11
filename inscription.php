<?php
// require('config.php');
// require('User.php');

$home = new View;
$home -> headerStyle('Inscription');
?>

<!-- <!DOCTYPE html>
<html>

<head>
    <title> Page d'inscription</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head> -->

<body id="bodyform">
    <main>
        <div class="padding-top2 padding-left4 padding-bottom3">
            <button><a href="index.php">Retour a l'Accueil</a></button>
        </div>
        <div align="center">
            <form method="POST">
                <?php if (isset($_POST['inscription'])) {
                    $user = new User();
                    $user->Register(htmlspecialchars($_POST['prenom']),htmlspecialchars($_POST['nom']),htmlspecialchars($_POST['mail']) , htmlspecialchars($_POST['adresse']),htmlspecialchars($_POST['codepostal']),htmlspecialchars($_POST['ville']),htmlspecialchars($_POST['password']), htmlspecialchars($_POST['passwordverify']));
                    $user->alerts();
                }
                ?>
                <table class="form">
                    <tr>
                        <td>
                            <h1 class="h_1">Bonjour, je suis nouveau ici. <br>Je crée mon compte</h1>
                            <label>Prénom*</label>
                            <input type="text" name="prenom" placeholder="Entrer votre prénom" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom*</label>
                            <input type="text" name="nom" placeholder="Entrer votre nom" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Adresse email*</label>
                            <input type="email" name="mail" placeholder="Entrer votre adresse email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Adresse*</label>
                            <input type="text" name="adresse" placeholder="Entrer votre adresse" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Code Postal*</label>
                            <input type="text" minlength="5" maxlength="5" name="codepostal" placeholder="Entrer votre code postal" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Ville*</label>
                            <input type="text" name="ville" placeholder="Entrer votre ville" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mot de passe*</label>
                            <input type="password" name="password" placeholder="Entrer un mot de passe" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Confirmation du mot de passe*</label>
                            <input type="password" name="passwordverify" placeholder="Confirmer le mot de passe" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <button class="button" type="submit" name="inscription">M'inscrire</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <footer>
        <div>
            <p class="scoreXcopyright padding-top3 ">Copyright ©2022 . Tous droits réservés.</p>
        </div>
                </footer>
    </main>
</body>

</html>