<?php

require_once './back/back_commentaire-admin.php';
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
    <table class="table">
            <thead>
                <tr>
                    <th class="th" scope="col">Nom</th>
                    <th class="th" scope="col">Prenom</th>
                    <th class="th" scope="col">Mail</th>
                    <th class="th" scope="col">Produit</th>
                    <th class="th" scope="col">Commentaire</th>
                    <th class="th" scope="col">Date</th>
                    <th class="th" scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getcommentaire as $c) { ?>
                    <tr>
                        <td class="td" value=" <?= $c['id']; ?>"><?= $c['nom'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['prenom'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['mail'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['id_produit'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['commentaire'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><span>publié le</span><?= $c['date'] ?></td>
                        <td class="td"><a href="?action=suppression&id=<?php echo $c['id'] ?>">supprimer</a></td> 
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </section>
</body>

</html>