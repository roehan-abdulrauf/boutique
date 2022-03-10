<?php
 
session_start();
include 'Class/View.php';
require_once 'Class/Products.php';
require_once 'Class/Panier.php';

// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page'])  && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'home';

// Include and show la page 
include $page . '.php';
?>