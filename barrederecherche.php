<?php
require_once 'Config.php';
require('Searchbar.php');
$adresse = new Searchbar();
?>

<body>
    <form method="POST">
        <input type="search" name="q" id="q" placeholder="Recherche...">
        <input type="submit" name="submit" value="Valider" />
        <?php
        if (isset($_POST['submit'])) {
            $adresse->BarreDerecherche(htmlspecialchars($_POST['q']));
        }
        ?>
    </form>
</body>