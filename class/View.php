<?php

class View
{
    public $title;

    public function headerStyle()
    {

        // // recupère le nombre d'articles dans le panier, celui-ci sera affiché dans l'en-tête.
        $items_panier = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
        // 
?>
        <!-- 
        <!DOCTYPE html>
        <html>
          <head>
               <meta charset="utf-8">
                <title></title>
              <link href="style.css" rel="stylesheet" type="text/css">
               <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
           </head>
            <body>  -->


        <?php if (isset($_SESSION['id_droit']) && $_SESSION['id_droit'] === '1') { ?>
            <header>

                <div class="content-wrapper">

                    <h1>Timestamp</h1>
                    <nav>

                        <a href="index.php">Accueil</a>
                        <a href="index.php?page=products">Nos produits</a>
                        <a href="index.php?page=categorie&cat=1">Montres homme</a>
                        <a href="index.php?page=categorie&cat=2">Montres femme</a>
                        <a href="index.php?page=profil">Mon profil</a>
                        <a href="index.php?page=deconnexion">Deconnexion</a>
                        <!-- <a href="index.php?page=inscription">Inscription</a>
                                <a href="index.php?page=connexion">Connexion</a> -->
                    </nav>
                    <div class="link-icons">
                        <a href="index.php?page=cart">
                            <i class="fas fa-shopping-cart"></i>
                            <?php if ($items_panier > 0) { ?>
                                <span><?= $items_panier ?></span>
                            <?php } ?>
                        </a>
                    </div>
                </div>
            </header>
        <?php } elseif (isset($_SESSION['id_droit']) && $_SESSION['id_droit'] === '23') { ?>


            <header>

                <div class="content-wrapper">

                    <h1>Timestamp</h1>
                    <nav>

                        <a href="index.php">Accueil</a>
                        <a href="index.php?page=products">Nos produits</a>
                        <a href="index.php?page=categorie&cat=1">Montres homme</a>
                        <a href="index.php?page=categorie&cat=2">Montres femme</a>
                        <a href="index.php?page=admin">Admin</a>
                        <a href="index.php?page=deconnexion">Deconnexion</a>
                    </nav>
                    <div class="link-icons">

                        <a href="index.php?page=cart">
                            <i class="fas fa-shopping-cart"></i>
                            <?php if ($items_panier > 0) { ?>
                                <span><?= $items_panier ?></span>
                            <?php } ?>
                        </a>
                    </div>
                </div>
            </header>

        <?php } else { ?>


            <header>

                <div class="content-wrapper">

                    <h1>Timestamp</h1>
                    <nav>

                        <a href="index.php">Accueil</a>
                        <a href="index.php?page=products">Nos produits</a>
                        <a href="index.php?page=categorie&cat=1">Montres homme</a>
                        <a href="index.php?page=categorie&cat=2">Montres femme</a>
                        <a href="index.php?page=inscription">Inscription</a>
                        <a href="index.php?page=connexion">Connexion</a>
                    </nav>
                    <div class="link-icons">

                        <a href="index.php?page=cart">

                            <i class="fas fa-shopping-cart"></i>
                            <?php if ($items_panier > 0) { ?>
                                <span><?= $items_panier ?></span>
                            <?php } ?>
                        </a>
                    </div>
                </div>
            </header>
            <?php

            require_once 'Config.php';
            require('class/Searchbar.php');
            $adresse = new Searchbar();

            ?>

            <form method="POST">
                <input type="search" name="q" id="q" placeholder="Recherche...">
                <input type="submit" name="submit" value="Valider" />
                <?php
                if (isset($_POST['submit'])) {
                    $adresse->BarreDerecherche(htmlspecialchars($_POST['q']));
                }
                ?>
            </form>

        <?php    } ?>
        </header>
        <main>
        <?php
    }

    public function footerStyle()
    {
        ?>
            <footer>
                <div class="footer-content">
                    <h6 class="titre-footer">Iced Watches </h6>
                    <p>Bonjour et bienvenue surIced Watches, le site où trouver les modèles les plus incroyables de montres pour tous les passionnés de la haute horlogerie.</p>
                    <ul class="socials">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
                    </ul>
                </div>
                <div class="footer-bottom">
                    <p>copyright 2022&copy; <a href="index.php">Iced Watches</a> </p>
                    <div class="footer-menu">
                        <ul class="f-menu">
                            <li><a href="index.php?page=aboutus">Qui sommes-nous?</a></li>
                        </ul>
                    </div>
                </div>
            </footer>

    <?php
    }
}
