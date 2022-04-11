<?php

$header = new View;
$header -> headerStyle('Shop');
require_once 'back/back_products.php';
?>


<div class="products content-wrapper">
<h1>Montres</h1>
<p><?=$total_products?> Products</p>
<div class="products-wrapper">
<?php foreach ($shop as $produit): ?>  
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
<a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
<?php endif; ?>
<?php if ($total_products > ($current_page * $produitsParPage) - $produitsParPage + count($shop)): ?>
<a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
<?php endif; ?>

</div>
</div>



