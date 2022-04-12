<?php
require_once 'Config.php';
require('User.php');
$user = new User();
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
    // require_once 'header.php';
    require_once 'admin.php' ?>
    <section>
        <table align="center">
            <thead>
                <tr>
                     <th scope="col">Nom</td>
                     <th scope="col">Prenom</td>
                     <th scope="col">Mail</td>
                     <th scope="col">Rôle</td>
                     <th scope="col">Commentaire</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $user->getAllInfos();
                ?>
            </tbody>
        </table>
    </section>
</body>

</html>