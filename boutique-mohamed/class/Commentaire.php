<?php

require_once 'config.php';

class Commentaire extends  Config
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

    public function getCommentaires()
    {

        $check = $this->bdd->prepare("SELECT * FROM `commentaires` INNER JOIN `utilisateurs` WHERE commentaires.id_utilisateur = utilisateurs.id");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getModifCommentaire()
    {

        $check = $this->bdd->prepare("SELECT * FROM `commentaires` WHERE id_utilisateur = ?");
        $check->execute(array($_GET['id']));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSuppCommentaire()
    {

        $req = $this->bdd->prepare("DELETE FROM `commentaires` WHERE id_utilisateur = ?");
        $req->execute(array($_GET['id']));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
