<?php
require_once 'Config.php';
require('Produit.php');
$user = new Produit();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>

<body>
    <?php
    require_once 'header.php';
    require_once 'admin.php' ?>
    <section>
        <table align="center">
            <thead>
                <tr>
                     <th scope="col">Nom</td>
                     <th scope="col">Prix</td>
                     <th scope="col">Description</td>
                     <th scope="col">Quantité</td>
                     <th scope="col">Catégorie</td>
                     <th scope="col">Date</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $user->getProduits();
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>