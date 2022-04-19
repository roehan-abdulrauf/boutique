<?php
// require_once 'Config.php';
// require('User.php');
$user = new User();
$infouser = $user->getAllInfos();

if (isset($_GET['action']) && $_GET['action'] == "suppression") {
    $produit = new User();
    $getuser = $produit->getUser();

    if (count($getuser)) {

    $produit = new User();
    $suppproduits = $produit->getSuppUser();
    header('location:index.php?page=compte-admin');
    }
}

?>