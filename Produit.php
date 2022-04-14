<?php

class Produit extends  Config
{
    public $_id;
    public $_nom;
    public $_prix;
    public $_img;
    public $_description;
    public $_quantite;
    private $_Malert;
    private $_Talert;

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function getProduits()
    {

        $check = $this->bdd->prepare("SELECT * FROM `produits`,`categories`");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <tr>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['blaze']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['prix']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['description']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['quantite']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['titre']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <span>publié le</span> <?php echo $data['date']; ?></td>
            </tr>
<?php
        }
    }

    public function getNombreProduits()
    {
        $check = $this->bdd->prepare("SELECT * FROM `produits`");
        $check->execute();
        // $res = $check->count();    
    }

    public function CreerProduits($nom, $prix, $img, $description, $quantite, $categorie)
    {

        $check = $this->bdd->prepare("SELECT `blaze`  FROM `produits` WHERE  `blaze` = :nom");
        $check->execute(array(':nom' => $nom,));
        $res = $check->fetchAll(PDO::FETCH_ASSOC);
        var_dump($res);
        if (!empty($nom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie)) {
            echo 2;
            if (count($res)) {
                echo 3;
                $this->_Malert = 'Nom de produit déjà utilisé.';
                $this->_Talert = 2;
            } elseif (count($res) < 1) {
                echo 4;
                $date = date('Y-m-d H:i:s');
                $req = $this->bdd->prepare("INSERT INTO produits (blaze, prix, img, description, quantite, date, id_categories) VALUES (:blaze, :prix, :img, :description, :quantite, :date, :id_categories)");
                $req->execute(array(
                    ':blaze' => $nom,
                    ':prix' => $prix,
                    ':img' => $img,
                    ':description' => $description,
                    ':quantite' => $quantite,
                    ':date' => $date,
                    ':id_categories' => $categorie,
                ));
                var_dump($req);
                var_dump($req->execute());
                $this->_Malert = 'Le produit à bien été ajouter avec succès.';
                $this->_Talert = 1;

                // header('refresh:2;url=admin.php');
            } else {
                echo 5;
                $this->_Malert = 'Vous devez remplir correctement tous les champs.';
                $this->_Talert = 2;
            }
        } else {
            $this->_Malert = 'Vous devez remplir tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function UpdateProduits($nom, $newnom, $prix, $img, $description, $quantite, $categorie)
    {

        if (!empty($nom) && !empty($newnom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie)) {

            $check = $this->bdd->prepare("SELECT `blaze`  FROM `produits` WHERE  `blaze` = :nom");
            $check->execute(array(':blaze' => $nom,));
            $res = $check->fetchAll(PDO::FETCH_ASSOC);
            var_dump($res);

            if (count($res)) {

                $check = $this->bdd->query("SELECT `blaze`  FROM `produits`");
                $res = $check->fetchAll();
                $checknom = $res[0]['blaze'];

                var_dump($res);

                if ($newnom != $checknom) {
                    $this->_Malert = 'Nom de produit déjà utiliser.';
                    $this->_Talert = 2;
                } else {
                    $date = date('Y-m-d H:i:s');
                    $req = $this->bdd->prepare(" UPDATE `produits` SET  `blaze` = :blaze , `prix` = :prix , `img` = :img , `description` = :description , `quantite` = :quantite , `date` = :date , `id_categories` = :id_categories WHERE nom = '$nom'");
                    $req->execute(array(
                        ':blaze' => $newnom,
                        ':prix' => $prix,
                        ':img' => $img,
                        ':description' => $description,
                        ':quantite' => $quantite,
                        ':date' => $date,
                        ':id_categories' => $categorie
                    ));
                    var_dump($req);
                    var_dump($req->execute());
                    var_dump($nom);
                    $this->_Malert = 'Le produit à bien été modifier avec succès.';
                    $this->_Talert = 1;

                    // header('refresh:2;url=admin.php');
                }
            } else {
                $this->_Malert = 'Nom de produit invalide ou inexistent.';
                $this->_Talert = 2;
            }
        } else {
            $this->_Malert = 'Vous devez remplir tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function DeleteProduits()
    {
        $userid = $_GET['id'];
        var_dump($_GET);

        $req = $this->bdd->prepare("DELETE FROM produits  WHERE id = '$userid' ");
        $req->execute(array());

        echo "Le produit a bien été supprimer";

        header('refresh:2;url=admin.php');
    }
}
