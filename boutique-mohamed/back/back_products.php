<?php

// Nombre de produits sur chaque page
$produitsParPage = 4;

// Je défini la page courante
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;

$back = new products;
$shop = $back->getAllProducts($produitsParPage,$current_page);


$total_products = $back->totalProducts(); 