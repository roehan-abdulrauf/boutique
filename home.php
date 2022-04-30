<?php

$sales=new Products;
$meilleures_ventes = $sales->bestSales();

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Accueil</title>
<link href="style.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="body-index">
<?php 
$home = new View;
$home -> headerStyle();
?>
<video id="video-index" autoplay loop>
<source src = "video/Hublot2.mp4" type = "video/mp4">
</video>
<div class="background-home">
    <div class="recentlyadded content-wrapper">
        
        <h2 class="titre-vendues">Nos montres les plus vendues</h2>
        
        <div class="products">
            
            <?php foreach ($meilleures_ventes as $produit): ?>
                <a href="index.php?page=product&id=<?=$produit['id']?>" class="product">
                    <img src="<?=$produit['img']?>" width="200" height="200" alt="<?=$produit['blaze']?>">
                    <span class="name"><?=$produit['blaze']?></span>
                    <span class="price">
                        <?=$produit['prix'].' euros';?>
                        
                    </span>
                </a>
                <?php endforeach?>
            </div>
        </div> 
        </div>
        <section class="section-index">
        <h1 class="titre-services">Nos Services</h1>
      <div class="row-index">
        <div class="column-index">
          <div class="card-index">
            <div class="icon-wrapper">
              <i class="fas fa-stamp"></i>
            </div>
            
            <h3>Produits certifiés</h3>
            <div class="max-width-index">
            <p>
              Toutes nos montres sont certifiées par un Maître horloger qui prouvera leur authenticité.
            </p>
            </div>
          </div>
        </div>
        <div class="column-index">
          <div class="card-index">
            <div class="icon-wrapper">
              <i class="fas fa-lock"></i>
            </div>
            <h3>Paiement sécurisé</h3>
            <div class="max-width-index">
            <p>
              Toutes les transactions sont sécurisées. Vos informations de paiement sont cryptées afin de vous 
              protéger.
            </p>
        </div>
          </div>
        </div>
        <div class="column-index">
          <div class="card-index">
            <div class="icon-wrapper">
              <i class="fas fa-truck"></i>
            </div>
            <h3>Livraison en main propre</h3>
            <div class="max-width-index">
            <p>
              Nous nous déplaçons directement chez vous, pour vous remettre en main propre votre montre.
            </p>
            <div class="max-width-index">
          </div>
        </div>
      </div>
    </section>
        
        <?php
        
        $home->footerStyle();?>
    </body>       
        
        













