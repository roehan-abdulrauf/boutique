<?php
// session_start();
// require('config.php');
// require('User.php');
$home = new View;
$home->headerStyle();
$user = new User();
$pass = $user->password();
$_SESSION['password'] = $pass['password'];
require_once('./back/back_historique.php');
// var_dump($_SESSION['password']);
// var_dump($_SESSION['nom']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title> Modification de profil</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <script src="js/hide_show.js"></script>
</head>

<body>
    <main>
        <form method="POST">
            <?php
            if (isset($_POST['modifier'])) {
                $user->Update(htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['adresse']), htmlspecialchars($_POST['codepostal']), htmlspecialchars($_POST['ville']), htmlspecialchars($_POST['password']), htmlspecialchars($_POST['passwordverify']));
                $user->alerts();
            }
            ?>
            <div class="container rounded bg-white mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3 border-right">
                        <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                            <img class="rounded-circle mt-5" width="150px" src="https://zupimages.net/up/22/16/zir5.png"><span class="font-weight-bold"><?= $_SESSION['prenom'] ?></span><span class="text-black-50"><br><?= $_SESSION['mail'] ?></span><span> </span>
                        </div>
                    </div>
                    <div class="col-md-5 border-right">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4 class="text-right">Modifier mon profil</h4>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6"><label class="labels">Nom</label><input type="text" class="form-control" name="nom" placeholder="Entrez votre nouveau nom" value="<?= $_SESSION['nom'] ?>"></div>
                                <div class="col-md-6"><label class="labels">Prénom</label><input type="text" class="form-control" name="prenom" placeholder="Entrez votre nouveau prénom" value="<?= $_SESSION['prenom'] ?>"></div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12"><label class="labels">Adresse</label><input type="text" class="form-control" name="adresse" placeholder="Entrez votre nouvelle adresse" value="<?= $_SESSION['adresse'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Code postal</label><input type="number" minlength="5" maxlength="5" class="form-control" name="codepostal" placeholder="Entrez votre nouveau code postal" value="<?= $_SESSION['code_postal'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Ville</label><input type="text" class="form-control" name="ville" placeholder="Entrez votre nouvelle ville" value="<?= $_SESSION['ville'] ?>"></div>
                                <div class="col-md-12"><label class="labels">Email</label><input type="email" class="form-control" name="mail" placeholder="Entrez votre nouveau mail" value="<?= $_SESSION['mail'] ?>"></div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6"><label class="labels">Mot de passe</label><input type="password" class="form-control" name="password" placeholder="Entrez votre nouveau mot de passe"></div>
                                <div class="col-md-6"><label class="labels">Confirmation mot de passe</label><input type="password" class="form-control" name="passwordverify" placeholder="Confirmer votre nouveau mot de passe"></div>
                            </div>
                            <div class="mt-5 text-center"><button class="btn2" type="submit" name="modifier">Modifier</button></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-3 py-5">
                            <div class="d-flex justify-content-between align-items-center experience">
                                <h6 class="titre-historique">Mon historique de commandes</h6>
                                <div class="plus-minus"> <img class="imghide" src="img/plus.png" id="eye" onclick="changer ()" /> </div>
                            </div>
                            <div id="tab">
                                <?php

                                foreach ($historique as $i) {
                                    while ($lastoid != $i['id']) {
                                        $lastoid = $i['id'];
                                ?>

                                        <table>
                                            <tr>
                                                <th scope="col">Commande n°</th>
                                                <td><?= $lastoid  ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Prix</th>
                                                <td><?= $i['montant'] ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Statut de la commande</th>
                                                <td><?= $i['etat'] ?></td>
                                            </tr>

                                            <tr>
                                                <th scope="col">Date de la commande</th>
                                                <td><?= $i['date'] ?></td>
                                            </tr>
                                        </table>
                                <?php
                                    }
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
            <?php
            $home->footerStyle();
            ?>
    </main>
    

</body>

</html>