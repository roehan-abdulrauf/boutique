<?php

$p = new View;
$p->headerStyle('Produit');
require_once 'back/back_product.php';

?>
<div class="product content-wrapper">

                    <img src="<?=$produit['img']?>" width="500" height="500" alt="<?=$produit['nom']?>">

                        <div>

                            <h1 class="name"><?=$produit['nom']?></h1>

                            <span class="price">
                                
                                <?=$produit['prix']?>
                            </span>

                            <form action="index.php?page=cart" method="post">

                                <input type="number" name="quantity" value="1" min="1" max="<?=$produit['quantite']?>" placeholder="Quantity" required>
                                <input type="hidden" name="product_id" value="<?=$produit['id']?>">
                                <input type="submit" value="Ajouter au panier">
                            </form>

                            <div class="description">
                                <?=$produit['description']?>

                            </div>
                        </div>
                </div> 
