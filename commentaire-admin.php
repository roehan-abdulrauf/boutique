<?php
session_start();
require_once 'back_commentaire-admin.php';
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
        <h1>Commentaires</h1>
    </div>
    <?php
    require_once 'admin.php' ?>
    <section>
        <table>
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Mail</th>
                    <th scope="col">Produit</th>
                    <th scope="col">Commentaire</th>
                    <th scope="col">Date</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($getcommentaire as $c) { ?>
                    <tr>
                        <td value=" <?= $c['id']; ?>"><?= $c['nom'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['prenom'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['mail'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['id_produit'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['commentaire'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><span>publié le</span><?= $c['date'] ?></td>
                        <td><a href="?action=suppression&id=<?php echo $c['id'] ?>">supprimer</a></td> -->
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </section>
</body>

</html>