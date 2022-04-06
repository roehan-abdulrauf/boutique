<?php

class Searchbar extends Config
{
   
    public function BarreDeRecherche($q)
    {
        echo 1;
        $produits = $this->bdd->query("SELECT nom, prix, description FROM produits ORDER BY id DESC");

        if (!empty($q)) {
            echo 2;
            $produits = $this->bdd->query('SELECT nom, prix, description FROM produits WHERE nom LIKE "%'.$q.'%" ORDER BY id DESC');

            if ($produits->rowCount() == 0) {
                echo 3;
                $produits = $this->bdd->query('SELECT nom, prix, description FROM produits WHERE CONCAT(nom, description) LIKE "%'.$q.'%" ORDER BY id DESC');
            }
        } elseif ($produits->rowCount() > 0) { 
            echo 4;?>
        
            <?php while ($a = $produits->fetch()) { ?>
                <li><?= $a['nom'] ?>
                <?= $a['description'] ?>
                <?= $a['prix'] ?> <br /></1i>
                <?php } ?>
                </ul>
            <?php } else { ?>
                Aucun résultat pour: <?= $q ?>...
            <?php } 
     }

}