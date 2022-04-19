<?php
// require_once 'Config.php';
// require_once('Produit.php');
$produit = new Produit();
$getproduits = $produit->getProduits();

if (isset($_GET['action']) && $_GET['action'] == "suppression") {
    $produit = new Produit();
    $modifproduits = $produit->getModifProduit();

    if (count($produit->getModifProduit())) {
        $produit = new Produit();
    $suppproduits = $produit->getSuppProduit();
    header('location:index.php?page=produit-admin');
    }
}
