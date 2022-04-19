<?php
require_once 'Config.php';
require_once('Produit.php');
$produit = new Produit();
$modifproduits = $produit->getModifProduit();
// var_dump($test);
foreach ($modifproduits as $p) {
    $_SESSION['id_produit'] = $p['id'];
    $_SESSION['blaze'] = $p['blaze'];
    $_SESSION['prix'] = $p['prix'];
    $_SESSION['img'] = $p['img'];
    $_SESSION['description'] = $p['description'];
    $_SESSION['quantite'] = $p['quantite'];
    $_SESSION['date'] = $p['date'];
    $_SESSION['id_categorie'] = $p['id_categorie'];
};

if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prix = htmlspecialchars($_POST['prix']);
    $img = htmlspecialchars($_POST['img']);
    $newimg = htmlspecialchars($_POST['newimg']);
    $description = htmlspecialchars($_POST['description']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $categorie = htmlspecialchars($_POST['categorie']);
    if (!empty($nom) && !empty($prix) && !empty($img) && !empty($newimg) && !empty($description) && !empty($quantite) && !empty($categorie)) {
        $product = $produit->getUpdateProduits(htmlspecialchars($_POST['nom']));
        if (count($product) == 0) {
            $produit->UpdateProduitsnewimg($_SESSION['blaze']);
        } else {
            echo 'Nom de produit invalide ou déjà utiliser.';
        }
    } elseif (!empty($nom) && !empty($prix) && !empty($img) && empty($newimg) && !empty($description) && !empty($quantite) && !empty($categorie)) {
        $product =  $produit->getUpdateProduits(htmlspecialchars($_POST['nom']));
        if (count($product) == 0) {
            $produit->UpdateProduits($_SESSION['blaze']);
        } else {
            echo 'Nom de produit invalide ou déjà utiliser.';
        }
    } else {
        echo 'Vous devez remplir tous les champs.';
    }
}
