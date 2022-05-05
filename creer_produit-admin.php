<?php
require_once './back/back_creer_produit-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <?php
    require_once 'admin.php' 
    ?>
    <div class="h1-titre-admin">
        <h1>Ajouter un produit</h1>
    </div>
    <div class="form-admin">
        <form method="POST">
            <div>
                <label class="label" for="nom">Nom</label>
                <input class="inputtext" type="text" id="nom" name="nom" placeholder="Nom produit" required>
            </div>
            <div>
                <label class="label" for="description">Description</label>
                <input class="inputtext" type="text" id="description" name="description" placeholder="Ce produit est.." required>
            </div>
            <div>
                <label class="label" for="prix">Prix</label>
                <input class="inputtext" type="number" id="prix" name="prix" placeholder="En euro" required>
            </div>
            <div>
                <label class="label" for="quantite">Quantité</label>
                <input class="inputtext" type="number" id="quantite" name="quantite" placeholder="0" required>
            </div>
            <div>
                <label class="label" for="categorie">Catégorie</label>
                <select id="categorie" name="categorie" required>
                    <option>Choisir une catégorie</option>
                    <?= $cat->getCategories(); ?>
                </select>
            </div>
            <div>
                <label class="label" for="img">Image</label>
                <input class="inputtext" type="text" id="img" name="img" placeholder="Lien de l'image" required>
            </div>
            <div class="form-admin-butt">
                <button type="submit" name="submit">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>