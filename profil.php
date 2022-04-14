<?php
// session_start();
// require('config.php');
// require('User.php');
$home = new View;
$home -> headerStyle('Profil');
$user = new User();
?>

<!DOCTYPE html>
<html>

<head>
    <title> Modification de profil</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- <?php include('header.php') ?> -->
    <main>
        <div align="center" class="formpadding padding-top7">
            <form method="POST">
                <?php
                if (isset($_POST['modifier'])) {
                    $user->Update(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['adresse']), htmlspecialchars($_POST['codepostal']), htmlspecialchars($_POST['ville']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['passwordverify']));
                    $user->alerts();
                }
                ?>
                <table class="form">
                    <tr>
                        <td>
                            <h1 class="h_1">Je modifie mes informations</h1>
                            <label>Mail*</label>
                            <input type="email" name="mail" placeholder="Entrer votre nouveau mail" value="<?= $_SESSION['mail'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Prénom*</label>
                            <input type="text" name="prenom" placeholder="Entrer votre nouveau prénom" value="<?= $_SESSION['prenom'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Nom*</label>
                            <input type="text" name="nom" placeholder="Entrer votre nouveau nom" value="<?= $_SESSION['nom'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Adresse*</label>
                            <input type="text" name="adresse" placeholder="Entrer votre nouvelle adresse" value="<?= $_SESSION['adresse'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Code Postal*</label>
                            <input type="number" minlength="5" maxlength="5" name="codepostal" placeholder="Entrer votre nouveau code postal" value="<?= $_SESSION['code_postal'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Ville*</label>
                            <input type="text" name="ville" placeholder="Entrer votre nouvelle ville" value="<?= $_SESSION['ville'] ?>" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Mot de passe*</label>
                            <input type="password" name="password" placeholder="Entrer votre nouveau mot de passe" required>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Confirmation du mot de passe*</label>
                            <input type="password" name="passwordverify" placeholder="Confirmer votre nouveau mot de passe" required>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <button class="button" type="submit" name="modifier">Modifier</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </main>
    <!-- <?php include('footer.php') ?> -->

</body>

</html>