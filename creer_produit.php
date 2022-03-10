<?php
require_once 'Config.php';
require('Produit.php');
$user = new Produit();
require('Categorie.php');
$cat = new Categorie();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">
        <?php if (isset($_POST['submit'])) {
            $user->CreerProduits($_POST['nom'], $_POST['prix'], $_POST['img'], $_POST['description'], $_POST['quantite'], $_POST['categorie']);
            $user->alerts();
        }
        ?>
        <div>
            <h1>Ajouter un produit</h1>
            <label for="">Nom</label>
            <input type="text" id="nom" name="nom" placeholder="Martin ..." required>
        </div>
        <div>
            <label for="">Prix</label>
            <input type="number" id="prix" name="prix" placeholder="En euro" required>
        </div>
        <div>
            <label for="">img</label>
            <input type="text" id="img" name="img" placeholder="Lien de l'image" required>
        </div>
        <div>
            <label for="">Description</label>
            <input type="text" id="description" name="description" placeholder="Ce produit est.." required>
        </div>
        <div>
            <label for="">Quantité</label>
            <input type="number" id="quantite" name="quantite" placeholder="0" required>
        </div>
        <div>
            <label for="categorie">Catégorie</label>
            <select id="categorie" name="categorie" required>
                <option>Choisir une catégorie</option>
                <?= $cat->getCategories(); ?>
            </select>
        </div>
        <div align="center">
                <button type="submit" name="submit">Ajouter</button>
        </div>
    </form>