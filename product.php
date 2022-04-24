<?php


require_once 'back/back_product.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <title>Page Produitr</title>
    <meta charset="UTF-8" />
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
</head>
</head>
<body>
    <?php
        $p = new View;
        $p->headerStyle();
    ?>
</body>
</html>
<div class="product content-wrapper">

                    <img src="<?=$produit['img']?>" width="500" height="500" alt="<?=$produit['blaze']?>">

                        <div>

                            <h1 class="name"><?=$produit['blaze']?></h1>

                            <span class="price">
                                
                                <?=$produit['prix']?> euros
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

                <div>
                            
                    <?php foreach($comments as $comment): ?>
                

                    <span><?php echo $comment['prenom']; ?> </span> 
                    <span><?php echo $comment['commentaire']?></span>
                    <?php endforeach ?> 
                </div>
