<?php

require_once './back/back_compte-admin.php';
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
        <h1>Comptes</h1>
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
                    <th scope="col">Rôle</th>
                    <th scope="col">Modifier Rôle</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($infouser as $c) { ?>
                    <tr>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['nom'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['prenom'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['mail'] ?></td>
                        <td value=" <?php echo $c['id']; ?>"><?= $c['id_droit'] ?></td>
                        <td><a href="modifier_droit-admin?action=modifier&id=<?php echo $c['id'] ?>">modifier</a></td>
                        <td><a href="index.php?page=compte-admin&action=suppression&id=<?php echo $c['id'] ?>">supprimer</a></td> -->
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </section>
</body>

</html>