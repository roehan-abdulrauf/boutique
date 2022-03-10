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
<div align="center">
    <form method="POST">
        <?php if (isset($_POST['submit'])) {
            $user->AdminUpdate($_POST['nom'], $_POST['prenom'], $_POST['mail'],$_POST['id_droits']);
            $user->alerts();
        }
        ?>
        <table>
            <tr>
                <td>
                    <h1>Modifier les droits de l'itulisateur</h1>
                    <label for="nom">Nom utilisateur</label>
                    <input type="text" id="nom" name="nom" placeholder="Nom de l'itulateur" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom">Prenom utilisateur</label>
                    <input type="text" id="prenom" name="prenom" placeholder="Prenom de l'itulateur" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="mail">Mail utilisateur</label>
                    <input type="text" id="mail" name="mail" placeholder="Mail de l'itulateur" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="id_droits">Catégorie</label>
                    <select id="id_droits" name="id_droits" required>
                       <option>Quel droit attribuer ?</option> 
                    <?= $cat->getDroits(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <button type="submit" name="submit">Modifier</button>
                </td>
            </tr>
        </table>
    </form>