<?php
require_once 'Config.php';
require('User.php');
$user = new User();
require('Droit.php');
$cat = new Droits();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Modifier Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>

<body>
    <?php
    require_once 'admin.php' ?>
    <div class="form-admin">
        <form method="POST">
            <?php if (isset($_POST['submit'])) {
                $user->AdminUpdate($_POST['nom'], $_POST['prenom'], $_POST['mail'], $_POST['id_droits']);
                $user->alerts();
            }
            ?>
            <div>
                <h1>Modifier les droits de l'utilisateur</h1>
                <label for="nom">Nom utilisateur</label>
                <input type="text" id="nom" name="nom" placeholder="Nom de l'itulateur" required>
            </div>
            <div>
                <label for="prenom">Prenom utilisateur</label>
                <input type="text" id="prenom" name="prenom" placeholder="Prenom de l'itulateur" required>
            </div>
            <div>
                <label for="mail">Mail utilisateur</label>
                <input type="text" id="mail" name="mail" placeholder="Mail de l'itulateur" required>
            </div>
            <div>
                <label for="id_droits">Catégorie</label>
                <select id="id_droits" name="id_droits" required>
                    <option>Quel droit attribuer ?</option>
                    <?= $cat->getDroits(); ?>
                </select>
            </div>
            <div class="form-admin-butt">
                <button type="submit" name="submit">Modifier</button>
            </div>
        </form>
    </div>
</body>