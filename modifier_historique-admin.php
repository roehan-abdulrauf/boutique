<?php
require_once './back/back_modifier_historique-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Modifier Commande</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <div class="h1-titre-admin">
        <h1>Modifier la commande</h1>
    </div>
    <?php
    // require_once 'admin.php' ?>
    <div class="form-admin">
        <form method="POST">
        <div class="input">
                <label class="label" for="nom">Id_produit</label>
                <input class="inputtext" type="text" id="id_produit" name="id_produit" value="<?= $_SESSION['id_produit'] ?>" readonly="<?= $_SESSION['id_produit'] ?>" required>
            </div>
            <div class="input">
                <label class="label" for="mail">Montant</label>
                <input class="inputtext" type="text" id="montant" name="montant" value="<?= $_SESSION['montant'] ?>" readonly="<?= $_SESSION['montant'] ?>" required>
            </div>
            <div class="input">
                <label class="label" for="etat">Etat commande</label>
                <select name="etat">
                    <option>En cours de preparation</option>
                    <option>En cours d'expédition</option>
                    <option>Livré à destination</option>
                </select>
            </div>
            <div class="form-admin-butt">
                <button type="submit" name="submit">Modifier</button>
            </div>
        </form>
    </div>
</body>