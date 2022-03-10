<?php

// Check si le parametre categorie est dans l'url
if (isset($_GET['cat'])&& is_numeric($_GET['cat'])&& $_GET['cat']>0) {

    // Choix du nombre de produit par page 
    $produitsParPage = 4;

    // Page courante -> index.php?page=product&categorie=1, index.php?page=product&categorie=1&p=2, etc...
    $current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

    $objet = new Products;
    $produits = $objet->catProduits($current_page,$produitsParPage);

    $totalProduit = $objet->totalCat();
} else {
    header('location: index.php');
}
    ?>