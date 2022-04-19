<?php
require_once './back/back_modifier_produit-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Modifier Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <div class="h1-titre-admin">
        <h1>Modifier un produit</h1>
    </div>
    <?php
    require_once 'admin.php' ?>
    <div class="form-admin">
        <form method="POST">
        <div class="input">
                <label class="label" for="nom">Nom</label>
                <input class="inputtext" type="text" id="nom" name="nom" value="<?= $_SESSION['blaze'] ?>" placeholder="Martin ..." required>
            </div>
            <div class="input">
                <label class="label" for="description">Description</label>
                <input class="inputtext" type="text" id="description" name="description" value="<?= $_SESSION['description'] ?>" placeholder="Ce produit est.." required>
            </div>
            <div class="input">
                <label class="label" for="prix">Prix</label>
                <input class="inputnum" type="number" id="prix" name="prix" value="<?= $_SESSION['prix'] ?>" placeholder="En euro" required>
            </div>
            <div class="input">
                <label class="label" for="quantite">Quantité</label>
                <input class="inputnum" type="number" id="quantite" name="quantite" value="<?= $_SESSION['quantite'] ?>" placeholder="0" required>
            </div>
            <div class="input">
                <label class="label" for="categorie">Catégorie</label>
                <input class="inputnum" type="number" id="categorie" name="categorie" value="<?= $_SESSION['id_categorie'] ?>" placeholder="0" required>
            </div>
            <div class="input">
                <label class="label" for="img">Image</label>
                <input class="inputtext" type="text" id="img" name="img" value="<?= $_SESSION['img'] ?>" readonly="readonly" placeholder="0" required>
            </div>
            <div class="input">
                <label class="label" for="newimg">Nouvelle image</label>
                <input class="inputfile" type="file" id="newimg" name="newimg" placeholder="Lien de l'image">
            </div>
            <div class="form-admin-butt">
                <button type="submit" name="submit">Modifier</button>
            </div>
        </form>
       
        </div>
    </div>
</body>