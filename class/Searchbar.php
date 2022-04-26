<?php
class Searchbar extends Config
{
    public function BarreDeRecherche($q)
    {
        // echo 1;
        // $produits = $this->bdd->query("SELECT blaze, prix, description FROM produits ORDER BY id DESC");
        // echo 1;
        $req = $this->bdd->prepare('SELECT id, blaze FROM produits WHERE blaze LIKE "%' . $q . '%" ORDER BY id DESC');
        $req->execute();
        $produits = $req->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($produits);

        if (!empty($q)) {
            // echo 2;
            if (count($produits)) {
                // echo 3;
                foreach ($produits as $a) { ?>
                   <a href="index.php?page=product&id=<?= $a['id'] ?>"><p><?= $a['blaze'] ?></p>
                    <?php } ?>
                <?php } else {
                ?>
                    Aucun résultat pour: <?= $q ?>...<?php
                                                    }
                                                }
                                            }
                                        }
