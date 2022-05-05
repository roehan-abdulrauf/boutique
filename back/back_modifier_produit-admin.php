<?php
// require_once 'Config.php';
// require_once('Produit.php');
$produit = new Produit();
$modifproduits = $produit->getModifProduit();
$cat = new Categorie();
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
    $description = htmlspecialchars($_POST['description']);
    $quantite = htmlspecialchars($_POST['quantite']);
    $categorie = htmlspecialchars($_POST['categorie']);
    $newcategorie = htmlspecialchars($_POST['newcategorie']);
    // var_dump($newcategorie);
    if (!empty($nom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie) && empty($newcategorie)) {
        $product = $produit->getUpdateProduits(htmlspecialchars($_POST['nom']));
        if (count($product) == 1) {
            $produit->UpdateProduits($_SESSION['blaze']);
            header('location:index.php?page=produit-admin');
        } else {
            echo 'Produit inexistent.';
        }
    } elseif (!empty($nom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie) && !empty($newcategorie)) {
        $product =  $produit->getUpdateProduits(htmlspecialchars($_POST['nom']));
        if (count($product) == 1) {
            $produit->UpdateProduitsnewcat($_SESSION['blaze']);
            header('location:index.php?page=produit-admin');
        } else {
            echo 'Produit inexistent.';
        }
    } else {
        echo 'Vous devez remplir tous les champs.';
    }
}
