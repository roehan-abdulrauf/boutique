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

    public function CreerProduits($nom, $prix, $img, $description, $quantite, $categorie)
    {

        $this->_nom = $nom;
        $this->_prix = $prix;
        $this->_img = $img;
        $this->_description = $description;-
        $this->_quantite = $quantite;
        $this->_categorie = $categorie;

        $check = $this->bdd->query("SELECT `nom`  FROM `produits` WHERE  `nom` = '$nom'");
        $res = $check->fetchAll(PDO::FETCH_ASSOC);
        var_dump($res);
        if (!empty($nom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie)) {
            if (count($res)) {
                $this->_Malert = 'Nom de produit déjà utilisé.';
                $this->_Talert = 2;
            } elseif (count($res) == 0) {
                $req = $this->bdd->prepare("INSERT INTO produits (nom, prix, img, description, quantite,vendu, date, id_cat) VALUES ('$nom', '$prix','$img','$description', '$quantite', '0', NOW(), '$categorie')");
                $req->execute();
                // $date = date('d-m-y');
                // $req = $this->bdd->prepare(" INSERT INTO `produits` (nom, prix, img, description, quantite,vendu, date, id_cat) VALUES (':nom', ':prix',':img',':description', ':quantite', ':vendu',':date', ':id_cat')");
                // $req->execute(array(
                //     ':nom' => $nom,
                //     ':prix' => $prix,
                //     ':img' => $img,
                //     ':description' => $description,
                //     ':quantité' => $quantite,
                //     ':vendu' => 0,
                //     ':date' => $date,
                //     ':id_cat' => $categorie
                //     ));
                var_dump($req);
                var_dump($req->execute());
                $this->_Malert = 'Le produit à bien été ajouter avec succès.';
                $this->_Talert = 1;

                // header('refresh:2;url=admin.php');
            } else {
                $this->_Malert = 'Vous devez remplir correctement tous les champs.';
                $this->_Talert = 2;
            }
        }else{
            $this->_Malert = 'Vous devez remplir tous les champs.';
            $this->_Talert = 2;  
        }
    }

    public function UpdateProduits($nom, $newnom, $prix, $img, $description, $quantite, $categorie)
    {
        $this->_nom = $nom;
        $this->_prix = $prix;
        $this->_img = $img;
        $this->_description = $description;
        $this->_quantite = $quantite;
        $this->_categorie = $categorie;

        if (!empty($nom) && !empty($newnom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie)) {

            $check = $this->bdd->query("SELECT  `nom`  FROM `produits` WHERE  `nom` = '$nom'");
            $res = $check->fetchAll(PDO::FETCH_ASSOC);
            var_dump($res);

            if (count($res)) {

                $req = $this->bdd->prepare(" UPDATE produits SET  nom = '$newnom' , prix = '$prix' , img = '$img' , description = '$description' , quantite = '$quantite' , vendu = '0' , date = NOW() , id_cat = '$categorie' WHERE nom = '$nom'");
                $req->execute();

                // $date = date('d-m-y');
                // $req = $this->bdd->prepare(" UPDATE `produits` SET  `nom` = ':nom' , `prix` = ':prix' , `img` = ':img' , `description` = ':description' , `quantite` = ':quantité' , `vendu` = ':vendu' , `date` = ':date' , `id_cat` = ':id_cat')");
                // $req->execute(array(
                //     ':nom' => $newnom,
                //     ':prix' => $prix,
                //     ':img' => $img,
                //     ':description' => $description,
                //     ':quantité' => $quantite,
                //     ':vendu' => 0,
                //     ':date' => $date,
                //     ':id_cat' => $categorie
                //     ));
                var_dump($req);
                var_dump($req->execute());
                var_dump($categorie);
                $this->_Malert = 'Le produit à bien été modifier avec succès.';
                $this->_Talert = 1;

                // header('refresh:2;url=admin.php');
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
