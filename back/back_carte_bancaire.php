<?php
// require_once('class/Config.php');
// require('class/Carte.php');
$carte = new Carte();

if (isset($_POST['btncommande'])) {

    $numero_carte = htmlspecialchars($_POST['numero_carte']);
    $nom_carte = htmlspecialchars($_POST['nom_carte']);
    $mois_carte = htmlspecialchars($_POST['mois_carte']);
    $annee_carte = htmlspecialchars($_POST['annee_carte']);
    $cvv = htmlspecialchars($_POST['cvv']);
    $enregistrer_carte = htmlspecialchars($_POST['enregistrer_carte']);

    if (!empty($numero_carte) && !empty($nom_carte) && !empty($mois_carte) && !empty($annee_carte) && !empty($cvv)) {
        echo 1;
        if ($enregistrer_carte) {
            echo 2;
            $enregistrer_carte = "oui";

            $numero_carte = crypt($numero_carte, 'carte_bancaire');

            $nom_carte = strtoupper($nom_carte);

            $req = $carte->RegisterCarte($numero_carte, $nom_carte,$enregistrer_carte);
            var_dump($req);
            header('location:index.php?page=paypal');
        }else{
            header('location:index.php?page=paypal');
        }
    } else {
        $_SESSION['erreur'] = 'Vous devez remplir correctement tous les champs.';
    }
}
