<?php
require_once './class/User.php';
$user = new User();
$modifuser = $user->getAllInfosAdmin();
// var_dump($modifuser);
foreach ($modifuser as $p) {
    $_SESSION['id'] = $p['id'];
    $_SESSION['nom'] = $p['nom'];
    $_SESSION['prenom'] = $p['prenom'];
    $_SESSION['mail'] = $p['mail'];
    $_SESSION['id_droit'] = $p['id_droit'];
};

if (isset($_POST['submit'])) {
    echo 1;
    $mail = htmlspecialchars($_POST['mail']);
    $id_droit = htmlspecialchars($_POST['id_droit']);
    if (!empty($id_droit)) {
        echo 2;
            $user->AdminUpdate($id_droit, $_SESSION['mail']);
            var_dump($_SESSION['id']);
            var_dump($_SESSION['mail']);
            var_dump($user);
            echo 'Les droits de l\'itulisateur ont bien été modifier.';
            header('refresh:2;url=compte-admin.php');
        } else {
            echo 'Vous devez remplir tous les champs.';
        }
    }
