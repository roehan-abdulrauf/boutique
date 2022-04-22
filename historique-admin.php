<?php

require_once './back/back_historique-admin.php';

?>
<!DOCTYPE html>
<html>
<header>

</header>
<head>
    <title>Historique de commande</title>
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
    <table class="table">
            <thead>
                <tr>
                    <th class="th" scope="col">Id_produit</th>
                    <th class="th" scope="col">Id_utilisateur</th>
                    <th class="th" scope="col">Montant</th>
                    <th class="th" scope="col">Etat</th>
                    <th class="th" scope="col">Adresse livraison</th>
                    <th class="th" scope="col">Adresse facturation</th>
                    <th class="th" scope="col">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($getOrderHistory as $h) { ?>
                    <tr>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['id_produit'] ?></td>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['id_utilisateur'] ?></td>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['montant'] ?></td>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['etat'] ?></td>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['adresse_livraison'] ?></td>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['adresse_facturation'] ?></td>
                        <td class="td" value=" <?php echo $h['id']; ?>"><?= $h['date'] ?></td>
                    </tr>
                <?php }; ?>
            </tbody>
            <tfoot>

            </tfoot>
        </table>
    </section>
</body>

</html>