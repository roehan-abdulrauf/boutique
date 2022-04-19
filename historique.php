<?php
session_start();
require('config.php');
require('User.php');
$user = new User();

?>

<!DOCTYPE html>
<html>

<head>
    <title> Page d'inscription</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style.css" />
</head>

<body id="bodyform">
    <main>
        <div class="padding-top2 padding-left4 padding-bottom3">
            <button><a href="index.php">Retour a l'Accueil</a></button>
        </div>
        <div align="center">
            <form method="POST">
                <?php
                $user->GetOrderHistoryById()

                ?>