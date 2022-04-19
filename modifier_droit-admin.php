<?php
require_once './back/back_modifier_droit-admin.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Modifier Categories</title>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="style2.css" />
</head>

<body>
    <div class="h1-titre-admin">
        <h1>Modifier le role de l'utilisateur</h1>
    </div>
    <?php
    // require_once 'admin.php' ?>
    <div class="form-admin">
        <form method="POST">
            <div>
                <label for="nom">Nom utilisateur</label>
                <input type="text" id="nom" name="nom" value="<?= $_SESSION['nom'] ?>" readonly="<?= $_SESSION['nom'] ?>" required>
            </div>
            <div>
                <label for="prenom">Prenom utilisateur</label>
                <input type="text" id="prenom" name="prenom" value="<?= $_SESSION['prenom'] ?>" readonly="<?= $_SESSION['prenom'] ?>" required>
            </div>
            <div>
                <label for="mail">Mail utilisateur</label>
                <input type="text" id="mail" name="mail" value="<?= $_SESSION['mail'] ?>" readonly="<?= $_SESSION['mail'] ?>" required>
            </div>
            <div>
                <label for="id_droit">Rôle</label>
                <input type="text" id="id_droit" name="id_droit" value="<?= $_SESSION['id_droit'] ?>" required>
            </div>
            <div class="form-admin-butt">
                <button type="submit" name="submit">Modifier</button>
            </div>
        </form>
    </div>
</body>