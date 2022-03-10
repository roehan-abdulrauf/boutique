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
    <title>Page Modifier Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>
<div align="center">
    <form method="POST">
        <?php if (isset($_POST['submit'])) {
            $user->UpdateProduits($_POST['nom'], $_POST['newnom'], $_POST['prix'], $_POST['img'], $_POST['description'], $_POST['quantite'], $_POST['categorie']);
            $user->alerts();
        }
        ?>
        <table>
            <tr>
                <td>
                    <h1>Modifier un produit</h1>
                    <label for="">Nom</label>
                    <input type="text" id="nom" name="nom" placeholder="Martin ..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Nouveau Nom</label>
                    <input type="text" id="nom" name="newnom" placeholder="Martin ..." required>
                </td>
            </tr>
            <tr>
                <td>
                    <address <label for="">Prix</label>
                        <input type="number" id="prix" name="prix" placeholder="En euro" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">img</label>
                    <input type="text" id="img" name="img" placeholder="Lien de l'image" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Description</label>
                    <input type="text" id="description" name="description" placeholder="Ce produit est.." required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Quantité</label>
                    <input type="number" id="quantite" name="quantite" placeholder="0" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="categorie">Catégorie</label>
                    <select type="text" id="categorie" name="categorie" required>
                        <option>Choisir une catégorie</option>
                        <?= $cat->getCategories(); ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <button type="submit" name="submit">Ajouter</button>
                </td>
            </tr>
        </table>
    </form>

    <?php /* if (isset($_POST['submit'])) {

        $nom = $_POST['nom'];
        $prix = $_POST['prix'];
        $description = $_POST['description'];
        $quantite = $_POST['quantite'];

        $check = $bdd->query("SELECT  `nom`  FROM `produits` WHERE  `nom` = '$nom'");
        $res = $check->fetchAll(PDO::FETCH_ASSOC);
        var_dump($res);
        $date = date('d-m-y');
        if (count($res)) {
            $req = $bdd->prepare(" UPDATE `produits` SET  `nom` = ':nom' , `prix` = ':prix' , `img` = ':img' , `description` = ':description' , `quantité` = ':quantité' , `vendu` = ':vendu' , `date` = ':date' , `id_cat` = ':id_cat')");
            $req->execute(array(
                ':nom' => $newnom,
                ':prix' => $prix,
                ':img' => $img,
                ':description' => $description,
                ':quantité' => $quantite,
                ':vendu' => 0,
                ':date' => $date,
                ':id_cat' => $categorie
            ));
            var_dump($req);
            var_dump($categorie);
            $this->_Malert = 'Le produit à bien été ajouter avec succès.';
            $this->_Talert = 1;
        }
    }*/
    ?>