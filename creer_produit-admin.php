<?php
session_start();
require_once 'Config.php';
require_once('Produit.php');
$produit = new Produit();
require_once('Categorie.php');
$cat = new Categorie();
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
    require_once 'admin.php' ?>
    <div class="h1-titre-admin">
        <h1>Ajouter un produit</h1>
    </div>
    <div class="form-admin">
        <form method="POST">
            <?php if (isset($_POST['submit'])) {
                $produit->CreerProduits(htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prix']), htmlspecialchars($_POST['img']), htmlspecialchars($_POST['description']), htmlspecialchars($_POST['quantite']), htmlspecialchars($_POST['categorie']));
                $produit->alerts();
            }
            ?>
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="Martin ..." required>
            </div>
            <div>
                <label for="description">Description</label>
                <input type="text" id="description" name="description" placeholder="Ce produit est.." required>
            </div>
            <div>
                <label for="prix">Prix</label>
                <input type="number" id="prix" name="prix" placeholder="En euro" required>
            </div>
            <div>
                <label for="quantite">Quantité</label>
                <input type="number" id="quantite" name="quantite" placeholder="0" required>
            </div>
            <div>
                <label for="categorie">Catégorie</label>
                <select id="categorie" name="categorie" required>
                    <option>Choisir une catégorie</option>
                    <?= $cat->getCategories(); ?>
                </select>
            </div>
            <div>
                <label for="img">Image</label>
                <input type="file" id="img" name="img" placeholder="Lien de l'image" required>
            </div>
            <div class="form-admin-butt">
                <button type="submit" name="submit">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>