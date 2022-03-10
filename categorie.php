<?php
    
$produit = new View;
$produit->headerStyle('Produit');
include 'back/back_categorie.php';

    ?>


            <div class="products content-wrapper">
        <h1>Montres</h1>
        <p><?=$totalProduit?> Products</p>
        <div class="products-wrapper">
            <?php foreach ($produits as $produit): ?>
            <a href="index.php?page=product&id=<?=$produit['id']?>" class="product">
                <img src="<?=$produit['img']?>" width="200" height="200" alt="<?=$produit['nom']?>">
                <span class="name"><?=$produit['nom']?></span>
                <span class="price">
                    <?=$produit['prix'].' euros'?>
                    
                </span>
            </a>
            <?php endforeach; ?>
        </div>
        <div class="buttons">
            <?php if ($current_page > 1): ?>
            <a href="index.php?page=categorie&cat=<?=$_GET['cat']?>&p=<?=$current_page-1?>">Prev</a>
            <?php endif; ?>
            <?php if ($totalProduit > ($current_page * $produitsParPage) - $produitsParPage + count($produits)): ?>
            <a href="index.php?page=categorie&cat=<?=$_GET['cat']?>&p=<?=$current_page+1?>">Next</a>
            <?php endif; ?>
        </div>
        </div>
