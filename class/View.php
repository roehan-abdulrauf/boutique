<?php

class View 
{
    public $title;

    public function headerStyle($title){

        // recupère le nombre d'articles dans le panier, celui-ci sera affiché dans l'en-tête.
        $items_panier = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
        ?>

        <!DOCTYPE html>
        <html>
            <head>
                <meta charset="utf-8">
                <title><?=$title?></title>
                <link href="style.css" rel="stylesheet" type="text/css">
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
            </head>

            <body>
                <header>
                    <div class="content-wrapper">
                        <h1>Timestamp</h1>
                        <nav>
                            <a href="index.php">Accueil</a>
                            <a href="index.php?page=products">Tous nos produits</a>
                            <a href="index.php?page=categorie&cat=1">Montres homme</a>
                            <a href="index.php?page=categorie&cat=2">Montres femme</a>
                        </nav>
                        <div class="link-icons">
                            <a href="index.php?page=cart">
                                <i class="fas fa-shopping-cart"></i>
                                <?php if($items_panier>0){?>
                                <span><?= $items_panier?></span>
                                <?php } ?>
                            </a>
                        </div>
                    </div>
                </header>
                <main>
        <?php
    }


}
