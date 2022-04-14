<?php
require_once 'Config.php';
require('Commentaire.php');
$user = new Commentaire();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Creer Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="#.css" />
</head>

<body>
    <?php
    require_once 'admin.php' ?>
    <section>
        <table align="center">
            <thead>
                <tr>
                     <th scope="col">Nom</td>
                     <th scope="col">Prenom</td>
                     <th scope="col">Mail</td>
                     <th scope="col">Produit</td>
                     <th scope="col">Commentaire</td>
                     <th scope="col">Date</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $user->getCommentaires();
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>