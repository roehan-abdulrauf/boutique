<?php

class View 
{
    public $title;

    public function headerStyle(){

        // // recupère le nombre d'articles dans le panier, celui-ci sera affiché dans l'en-tête.
        $items_panier = isset($_SESSION['panier']) ? count($_SESSION['panier']) : 0;
        // ?>
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
                
            
            <?php if(isset($_SESSION['id_droits']) && $_SESSION['id_droits'] === '1'){ ?>
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
                                    <?php if($items_panier>0){?>
                                    <span><?= $items_panier?></span>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                </header>
                    <?php } elseif (isset($_SESSION['id_droits']) && $_SESSION['id_droits'] === '23') { ?>
                    

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
                                    <?php if($items_panier>0){?>
                                    <span><?= $items_panier?></span>
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
                                        <?php if($items_panier>0){?>
                                        <span><?= $items_panier?></span>
                                        <?php } ?>
                                    </a>
                                </div>
                                </div>
                                </header>
                    <?php 

                        require_once 'Config.php';
                        require('Searchbar.php');
                        $adresse = new Searchbar();

                        ?>

                        <form method="POST">
                        <?php if (isset($POST['submit'])) {
                                    $user->BarreDerecherche(htmlspecialchars($_POST['q']));
                                    $user->alerts();
                                }
                                ?>
                            <input type="search" name="q" id="q" placeholder="Recherche...">
                            <input type="submit" value="Valider" />
                        </form>
                       
                                    <?php    } ?>
                                        </header>
                                        <main>
                                <?php
    }


}
