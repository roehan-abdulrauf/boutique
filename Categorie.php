<?php

class Categorie extends Config
{

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function getCategories()
    {

        $check = $this->bdd->query("SELECT * FROM `categories`");
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <option value=" <?php echo $data['id']; ?>"> <?php echo $data['nom']; ?></option>
<?php
        }
    }

    public function UpdateCategories($id, $nom)
    {
        $this->_nom = $nom;
        $this->_id = $id;

        if (!empty($select) && !empty($nom)) {

            $req = $this->bdd->prepare("UPDATE `categories`  SET `nom` = $nom");
            $req->execute();

            $this->_Malert = 'La categorie à bien été modifier avec succès.';
            $this->_Talert = 1;

            header('refresh:2;url=admin.php');
        } else {
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function CreerCategories($nom)
    {
        if (!empty($nom)) {
            $req = $this->bdd->prepare("INSERT INTO `categories` (`nom`) values ($nom)");
            $req->execute();

            $this->_Malert = 'La categorie à bien été ajouter avec succès.';
            $this->_Talert = 1;

            header('refresh:2;url=admin.php');
        } else {
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function DeleteCategories()
    {
        $userid = $_GET['id'];
        var_dump($_GET);

        $req = $this->bdd->prepare("DELETE FROM utilisateurs  WHERE id = '$userid' ");
        $req->execute(array());

        echo "L'utilisateur a bien été supprimer";

        header('refresh:2;url=admin.php');
    }
}
