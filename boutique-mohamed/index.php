<?php

session_start();
include './class/View.php';
require_once './class/Products.php';
require_once './class/Panier.php';
require_once './class/User.php';
require_once './class/Produit.php';
require_once './class/Categorie.php';
require_once './class/Commentaire.php';


// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page'])  && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';

// Include and show la page 
include $page . '.php';
?>