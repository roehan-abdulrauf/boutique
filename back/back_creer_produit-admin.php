<?php
// require_once 'Config.php';
// require_once('Produit.php');
$produit = new Produit();
// require_once('Categorie.php');
$cat = new Categorie();

if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prix = htmlspecialchars($_POST['prix']);
    $img = htmlspecialchars($_POST['img']);
    $description = htmlspecialchars($_POST['description']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $categorie = htmlspecialchars($_POST['categorie']);
    $date = date('Y-m-d H:i:s');

    $res = $produit->getUpdateProduits($nom);
    // var_dump($res);
    if (count($res) == 0) {
        if (!empty($nom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($date) && !empty($categorie)) {
            $req = $produit->CreerProduits($nom, $prix, $img, $description, $quantite, $date, $categorie);
            // var_dump($req);
            echo 'Le produit à bien été ajouter avec succès.';
            header('location:index.php?page=produit-admin');
        } else {
            echo 'Vous devez remplir correctement tous les champs.';
        }
    } else {
        echo 'Nom de produit déjà utilisé.';
    }
}
