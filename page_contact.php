<?php

require_once 'config.php';

require('Contact.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Contact</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">

        <?php if (isset($_POST['submit'])) {
             $user = new Contact();
             $user->Contacts($_POST['nom'], $_POST['email'], $_POST['numero'], $_POST['sujet'], $_POST['message']);
            $user->alerts();
        }
        ?>
        <table>
            <tr>
                <td>
                    <h1>Contact</h1>
                    <label for="nom">Votre nom et prenom</label>
                    <input type="text" id="nom" name="nom" placeholder="Martin ..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="email">Votre adresse e-mail</label>
                    <input type="email" id="email" name="email" placeholder="...@laplateforme.io" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="numero">Votre numéro de téléphone</label>
                    <input type="text" id="numero" name="numero" placeholder="+33..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="sujet">Le sujet de votre message</label>
                    <input type="text" id="sujet" name="sujet" placeholder="sujet" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="message">Votre message</label>
                    <textarea id="message" name="message" placeholder="Bonjour, je vous contacte car...." required></textarea>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <button type="submit" name="submit">Envoyer mon message</button>
                </td>
            </tr>
        </table>
    </form>