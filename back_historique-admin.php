<?php
require_once 'Config.php';
require('Produit.php');
$produit = new Produit();
$getOrderHistory = $produit->GetAllOrderHistory();
?>