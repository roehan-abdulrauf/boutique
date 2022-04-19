<?php
session_start();
require_once 'Config.php';
require('Categorie.php');
$adresse = new Categorie();

?>

<form method="POST">
<?php if (isset($POST['submit'])) {
            $user->BarreDerecherche(htmlspecialchars($_POST['q']));
            $user->alerts();
        }
        ?>
    <input type="search" name="q" id="q" placeholder="Recherche...">
    <input type="submit" value="Valider" />
</form>
<?php if ($articles->rowCount() > 0) { ?>
    <ul>
        <?php while ($a = $articles->fetch()) { ?>
            <li><?= $a["titre"] ?> <br /> <?= $a["concatenation"] ?></li>
        <?php } ?>
    </ul>
<?php } else { ?>
    Aucun résultat pour: <?= $q ?>...
<?php } ?>


