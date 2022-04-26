<?php

class Commande extends Config
{
    public $_etat;

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function GetAllOrderHistory()
    {
        $req = $this->bdd->prepare("SELECT * FROM `commandes`");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetAllOrderHistorybyId()
    {
        $req = $this->bdd->prepare("SELECT * FROM `commandes` WHERE id = ?");
        $req->execute(array($_GET['id']));
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

    public function UpdateOrderHistory($etat, $id)
    {

        $req = $this->bdd->prepare(" UPDATE `commandes` SET `etat` = :etat WHERE id = :id");
        $req->execute(array(
            ':etat' => $etat,
            ':id' => $id,
        ));
    }
}



// creation class commande et back_modifier_historique.php et modifier_historique.php
// deplacement des requet historique-admin.php et historique.php dans Commande.php depuis Produit.php
// modification page back_historique-admin.php et back_historique.php
