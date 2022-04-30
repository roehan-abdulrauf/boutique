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


                <nav>
                    <input type="checkbox" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fas fa-bars"></i>
                    </label>

                    <label class="logo">Iced Watches</label>
                    <ul>
                        <li><a class="active" href="index.php">Accueil</a></li>
                        <li><a href="index.php?page=products">Nos produits</a></li>
                        <li><a href="index.php?page=categorie&cat=1">Montres homme</a></li>
                        <li><a href="index.php?page=categorie&cat=2">Montres femme</a></li>
                        <li><a href="index.php?page=profil">Mon profil</a></li>
                        <li><a href="index.php?page=deconnexion">Deconnexion</a></li>
                        <li><a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if ($items_panier > 0) { ?>
                            <span><?= $items_panier ?></span>
                        <?php } ?>
                    </a></li>
                    <?php

require_once 'Config.php';
require('Searchbar.php');
$adresse = new Searchbar();

?>

<li><form method="POST">
    <?php if (isset($POST['submit'])) {
        $user->BarreDerecherche(htmlspecialchars($_POST['q']));
        $user->alerts();
    }
    ?>
    <input type="search" name="q" id="q" placeholder="Recherche...">
    <input type="submit" value="Valider" />
</form></li>
                    </ul>
            </nav>
            </header>
        <?php } elseif (isset($_SESSION['id_droit']) && $_SESSION['id_droit'] === '23') { ?>


            <header>

                <nav>
                    <input type="checkbox" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fas fa-bars"></i>
                    </label>
                    <label class="logo">Iced Watches</label>
                    <ul>

                        <li><a class="active" href="index.php">Accueil</a></li>
                        <li><a href="index.php?page=products">Nos produits</a></li>
                        <li><a href="index.php?page=categorie&cat=1">Montres homme</a></li>
                        <li><a href="index.php?page=categorie&cat=2">Montres femme</a></li>
                        <li><a href="index.php?page=admin">Admin</a></li>
                        <li><a href="index.php?page=deconnexion">Deconnexion</a></li>
                        <li><a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if ($items_panier > 0) { ?>
                            <span><?= $items_panier ?></span>
                        <?php } ?>
                    </a></li>
                    <?php

require_once 'Config.php';
require('Searchbar.php');
$adresse = new Searchbar();

?>

<li><form method="POST">
    <?php if (isset($POST['submit'])) {
        $user->BarreDerecherche(htmlspecialchars($_POST['q']));
        $user->alerts();
    }
    ?>
    <input type="search" name="q" id="q" placeholder="Recherche...">
    <input type="submit" value="Valider" />
</form></li>
                    </ul>
            </nav>
            </header>

        <?php } else { ?>


            <header>
                <nav>
                    <input type="checkbox" id="check">
                    <label for="check" class="checkbtn">
                        <i class="fas fa-bars"></i>
                    </label>
                    <label class="logo">Iced Watches</label>
                    <ul>
                        <li><a class="active" href="index.php">Accueil</a></li>
                        <li><a href="index.php?page=products">Nos produits</a></li>
                        <li><a href="index.php?page=categorie&cat=1">Montres homme</a></li>
                        <li><a href="index.php?page=categorie&cat=2">Montres femme</a></li>
                        <li><a href="index.php?page=inscription">Inscription</a><li>
                        <li><a href="index.php?page=connexion">Connexion</a></li>
                        <li><a href="index.php?page=cart">
                        <i class="fas fa-shopping-cart"></i>
                        <?php if ($items_panier > 0) { ?>
                            <span><?= $items_panier ?></span>
                        <?php } ?>
                    </a></li>
                    <?php

require_once 'Config.php';
require('Searchbar.php');
$adresse = new Searchbar();

?>

<li><form method="POST">
    <?php if (isset($POST['submit'])) {
        $user->BarreDerecherche(htmlspecialchars($_POST['q']));
        $user->alerts();
    }
    ?>
    <input type="search" name="q" id="q" placeholder="Recherche...">
    <input type="submit" value="Valider" />
</form></li>
                    </ul>
            </nav>
            </header>


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
                    <p>Bonjour et bienvenue sur Iced Watches, le site où trouver les modèles les plus incroyables de montres pour tous les passionnés de la haute horlogerie.</p>
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
