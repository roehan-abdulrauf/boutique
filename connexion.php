<?php
// session_start();
// require('config.php');
// require('User.php');
$home = new View;
$home -> headerStyle('Connexion');
?>
<!DOCTYPE html>
<html>

<head>
    <title> Page de connexion</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="Style.css" />
</head>

<body>
    <main>
        <div align="center" class="formpadding">
            <form method="POST">
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
                }
                ?>
                <table class="form">
                    <tr>
                        <td>
                            <h1 class="h_1">Bonjour, connectez-vous</h1>
                            <label>Votre adresse email</label>
                            <input type="email" name="mail" placeholder="Entrer votre adresse email" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mot de passe</label>
                            <input type="password" name="password" placeholder="Entrer un mot de passe" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <button class="button" type="submit" name="connexion">Me connecter</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
</body>

</html>