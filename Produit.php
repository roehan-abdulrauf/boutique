<?php

class Produit extends  Config
{
    public $_id;
    public $_blaze;
    public $_prix;
    public $_img;
    public $_description;
    public $_quantite;
    public $_date;
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
        $check = $this->bdd->prepare("SELECT * FROM `produits`");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getModifProduit()
    {

        $check = $this->bdd->prepare("SELECT * FROM `produits` WHERE id = ?");
        $check->execute(array($_GET['id']));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSuppProduit()
    {

        $req = $this->bdd->prepare("DELETE FROM `produits` WHERE id =$_GET[id]");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
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
        if (count($res) == 0) {
            if (!empty($nom) && !empty($prix) && !empty($img) && !empty($description) && !empty($quantite) && !empty($categorie)) {
                echo 2;
                $date = date('Y-m-d H:i:s');
                $req = $this->bdd->prepare("INSERT INTO produits (blaze, prix, img, description, quantite, date, id_categorie) VALUES (:blaze, :prix, :img, :description, :quantite, :date, :id_categorie)");
                $req->execute(array(
                    ':blaze' => $nom,
                    ':prix' => $prix,
                    ':img' => $img,
                    ':description' => $description,
                    ':quantite' => $quantite,
                    ':date' => $date,
                    ':id_categorie' => $categorie,
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
            $this->_Malert = 'Nom de produit déjà utilisé.';
            $this->_Talert = 2;
        }
    }

    public function getUpdateProduits($nom)
    {
        $check = $this->bdd->prepare("SELECT `blaze` FROM `produits` WHERE  `blaze` = ?");
        $check->execute(array($nom));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateProduits($nom)
    {
        $newnom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $img = htmlspecialchars($_POST['img']);
        $description = htmlspecialchars($_POST['description']);
        $quantite = htmlspecialchars($_POST['quantite']);
        $categorie = htmlspecialchars($_POST['categorie']);

        $date = date('Y-m-d H:i:s');
        $req = $this->bdd->prepare(" UPDATE `produits` SET  `blaze` = :blaze , `prix` = :prix , `img` = :img , `description` = :description , `quantite` = :quantite , `date` = :date , `id_categorie` = :id_categorie WHERE blaze = '$nom'");
        $req->execute(array(
            ':blaze' => $newnom,
            ':prix' => $prix,
            ':img' => $img,
            ':description' => $description,
            ':quantite' => $quantite,
            ':date' => $date,
            ':id_categorie' => $categorie
        ));
        $this->_Malert = 'Le produit à bien été modifier avec succès.';
        $this->_Talert = 1;

        header('refresh:2;url=produit-admin.php');
    }

    public function UpdateProduitsnewimg($nom)
    {
        $newnom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $newimg = htmlspecialchars($_POST['newimg']);
        $description = htmlspecialchars($_POST['description']);
        $quantite = htmlspecialchars($_POST['quantite']);
        $categorie = htmlspecialchars($_POST['categorie']);
        $date = date('Y-m-d H:i:s');
        $req = $this->bdd->prepare(" UPDATE `produits` SET  `blaze` = :blaze , `prix` = :prix , `img` = :img , `description` = :description , `quantite` = :quantite , `date` = :date , `id_categorie` = :id_categorie WHERE blaze = '$nom'");
        $req->execute(array(
            ':blaze' => $newnom,
            ':prix' => $prix,
            ':img' => $newimg,
            ':description' => $description,
            ':quantite' => $quantite,
            ':date' => $date,
            ':id_categorie' => $categorie
        ));
        $this->_Malert = 'Le produit à bien été modifier avec succès.';
        $this->_Talert = 1;

        header('refresh:2;url=produit-admin.php');
    }

    public function DeleteProduits()
    {
        if (isset($_GET['action']) && $_GET['action'] == "suppression") {   // $contenu .= $_GET['id_produit']
            $resultat = $this->bdd->prepare("DELETE FROM produit WHERE id_produit=$_GET[id_produit]");
            $resultat->execute();
            $produit_a_supprimer = $resultat->fetchAll(PDO::FETCH_ASSOC);
        }
    }

    public function GetAllOrderHistory()
    {
        $req = $this->bdd->prepare("SELECT * FROM `commandes`");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetOrderHistoryById()
    {
        $id = $_SESSION['id'];
        $req = $this->bdd->prepare("SELECT * FROM `commandes` WHERE id=?");
        $req->execute(array($id));
        $req = $req->fetchAll(PDO::FETCH_ASSOC);
        var_dump($req);
    }

    public function getId()
    {
        $id = $this->_id;

        return $id;
    }

    public function getBlaze()
    {
        $blaze = $this->_blaze;

        return $blaze;
    }

    public function getPrix()
    {
        $prix = $this->_prix;

        return $prix;
    }

    public function getImage()
    {
        $img = $this->_img;

        return $img;
    }

    public function getDescription()
    {
        $description = $this->_description;

        return $description;
    }

    public function getQuantite()
    {
        $quantite = $this->_quantite;

        return $quantite;
    }

    public function getDate()
    {
        $date = $this->_date;

        return $date;
    }
}
