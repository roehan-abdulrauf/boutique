<?php
class Searchbar extends Config
{
    public function BarreDeRecherche($q)
    {
        // echo 1;
        // $produits = $this->bdd->query("SELECT blaze, prix, description FROM produits ORDER BY id DESC");
        // echo 1;
        $req = $this->bdd->prepare('SELECT blaze, prix, description FROM produits WHERE blaze LIKE "%' . $q . '%" ORDER BY id DESC');
        $req->execute();
        $produits = $req->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($produits);

        if (!empty($q)) {
            // echo 2;
            if (count($produits)) {
                // echo 3;
                foreach ($produits as $a) { ?>
                    <li><?= $a['blaze'] ?>
                        <?= $a['description'] ?>
                        <?= $a['prix'] ?> <br /></1i>
                    <?php } ?>
                    </ul>
                <?php } else {
                ?>
                    Aucun résultat pour: <?= $q ?>...<?php
                                                    }
                                                }
                                            }
                                        }
