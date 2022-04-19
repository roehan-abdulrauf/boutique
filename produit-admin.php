<?php
session_start();
require_once 'back_produit-admin.php';
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
        <button type="submit"><a href="creer_produit-admin.php">Ajouter</a></button>
    </div>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Description</th>
                    <th scope="col">Prix</th>
                    <th scope="col">Image</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Catégorie</th>
                    <th scope="col">Date</th>
                    <th scope="col">modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getproduits as $p) { ?>
                    <tr>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['blaze'] ?></td>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['description'] ?></td>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['prix'] ?></td>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['img'] ?></td>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['quantite'] ?></td>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['id_categorie'] ?></td>
                        <td value=" <?php echo $p['id']; ?>"><?= $p['date'] ?></td>
                        <td><a href="modifier_produit-admin?action=modifier&id=<?php echo $p['id'] ?>">modifier</a></td>
                        <td><a href="?action=suppression&id=<?php echo $p['id'] ?>">supprimer</a></td> -->
                    </tr>
                <?php }; ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </section>
</body>

</html>