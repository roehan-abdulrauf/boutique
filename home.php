<?php
$home = new View;
$home -> headerStyle('Accueil');

$sales=new Products;
$meilleures_ventes = $sales->bestSales();
?>

        <!-- <div class="featured">
            <h2></h2>
            <p></p>
        </div> -->
        <div class="recentlyadded content-wrapper">

            <h2>Les plus vendues</h2>

            <div class="products">
                
                <?php foreach ($meilleures_ventes as $produit): ?>
                <a href="index.php?page=product&id=<?=$produit['id']?>" class="product">
                    <img src="<?=$produit['img']?>.jpg" width="200" height="200" alt="<?=$produit['nom']?>">
                    <span class="name"><?=$produit['nom']?></span>
                    <span class="price">
                        <?=$produit['prix'].' euros';?>
                        
                    </span>
                </a>
                <?php endforeach?>
            </div>
        </div> 



















