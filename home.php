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
<body>
<?php 
$home = new View;
$home -> headerStyle();
?>
    <div class="recentlyadded content-wrapper">
        
        <h2>Les plus vendues</h2>
        
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
        
    </body>
    <?php
    $home->footerStyle();
        
        
        
        
        













