<?php

require_once './back/back_produit-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <div class="h1-titre-admin">
        <h1>Produits</h1>
    </div>
    <?php
    require_once 'admin.php' ?>
    <section>
    <div class="h1-titre-admin">
        <button type="submit"><a href="index.php?page=creer_produit-admin">Ajouter</a></button>
    </div>
    <table class="table">
            <thead>
                <tr>
                    <th class="th" scope="col">Nom</th>
                    <th class="th" scope="col">Description</th>
                    <th class="th" scope="col">Prix</th>
                    <th class="th" scope="col">Image</th>
                    <th class="th" scope="col">Quantité</th>
                    <th class="th" scope="col">Catégorie</th>
                    <th class="th" scope="col">Date</th>
                    <th class="th" scope="col">modifier</th>
                    <th class="th" scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getproduits as $p) { ?>
                    <tr>
                        <td class="td" value=" <?php echo $p['id']; ?>"><?= $p['blaze'] ?></td>
                        <td class="td" value=" <?php echo $p['id']; ?>"><?= $p['description'] ?></td>
                        <td class="td" value=" <?php echo $p['id']; ?>"><?= $p['prix'] ?></td>
                        <td class="td" value=" <?php echo $p['id']; ?>"><img src="<?= $p['img']?>" width="90"></td>
                        <td class="td" value=" <?php echo $p['id']; ?>"><?= $p['quantite'] ?></td>
                        <td class="td" value=" <?php echo $p['id']; ?>"><?= $p['id_categorie'] ?></td>
                        <td class="td" value=" <?php echo $p['id']; ?>"><?= $p['date'] ?></td>
                        <td class="td"><a href="index.php?page=modifier_produit-admin&action=modifier&id=<?php echo $p['id'] ?>">modifier</a></td>
                        <td class="td"><a href="index.php?page=produit-admin&action=suppression&id=<?php echo $p['id'] ?>">supprimer</a></td> -->
                    </tr>
                <?php }; ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </section>
</body>

</html>