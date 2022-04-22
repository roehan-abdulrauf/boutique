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
    <table class="table">
            <thead>
                <tr>
                    <th class="th" scope="col">Nom</th>
                    <th class="th" scope="col">Prenom</th>
                    <th class="th" scope="col">Mail</th>
                    <th class="th" scope="col">Rôle</th>
                    <th class="th" scope="col">Modifier Rôle</th>
                    <th class="th" scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($infouser as $c) { ?>
                    <tr>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['nom'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['prenom'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['mail'] ?></td>
                        <td class="td" value=" <?php echo $c['id']; ?>"><?= $c['id_droit'] ?></td>
                        <td class="td"><a href="index.php?page=modifier_droit-admin&action=modifier&id=<?php echo $c['id'] ?>">modifier</a></td>
                        <td class="td"><a href="?action=suppression&id=<?php echo $c['id'] ?>">supprimer</a></td> -->
                    </tr>
                <?php }; ?>
            </tbody>
        </table>
    </section>
</body>

</html>