<?php


require_once 'back/back_cart.php'
?>
<head>
    <title>Panier</title>
    <meta charset="UTF-8" />
    <!-- <link rel="stylesheet" href="style2.css" />  -->
    <link href="cartStyle.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
</head>
<body>
    
    <?php
$header = new View;
$header->headerStyle();
?>
<main>

    <div class="cart content-wrapper">
        <h1>Shopping Cart</h1>
        <form action="index.php?page=cart" method="post">
            <table>
                <thead>
                            <tr>
                                <td colspan="2">Product</td>
                                <td>Price</td>
                                <td>Quantity</td>
                                <td>Total</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($products)): ?>
                            <tr>
                                <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                            </tr>
                            <?php else: ?>
                            <?php foreach ($products as $product): ?>
                            <tr>
                                <td class="img">
                                    <a href="index.php?page=product&id=<?=$product['id']?>">
                                        <img src="<?=$product['img']?>" width="50" height="50" alt="<?=$product['blaze']?>">
                                    </a>
                                </td>
                                <td>
                                    <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['blaze']?></a>
                                    <br>
                                    <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                                </td>
                                <td class="price"><?=$product['prix']?> euros</td>
                                <td class="quantity">
                                    <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantite']?>" placeholder="Quantity" required>
                                </td>
                                <td class="price"><?=$product['prix'] * $products_in_cart[$product['id']]?> euros</td>
                            </tr>
                            <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <div class="subtotal">

                        <span class="text">Subtotal</span>
                        <span class="price"><?=$subtotal?> euros </span>
                    </div>
                    <div class="buttons">

                        <input type="submit" value="Update" name="update">
                        <input type="submit" value="Place Order" name="placeorder">
                    </div>
                </form>
            </div>

    </main>

    <?php
        // $header->footerStyle();
        
    ?>
    </body>

