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

        $req = $this->bdd->prepare("SELECT * FROM `commandes` INNER JOIN `produit_commande` WHERE commandes.num_commande = produit_commande.num_commande");
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

    public function payment($id_produit_panier,$num_commande,$quantite_produit_panier)
    {

            $req = $this->bdd->prepare("INSERT INTO `produit_commande`(`id_produits`, `num_commande`, `quantite`) VALUES (:id_produits,:num_commande,:quantite)");
            $res = $req->execute(array(
                ':id_produits' => $id_produit_panier,
                ':num_commande' => $num_commande,
                ':quantite' => $quantite_produit_panier
            ));
            
        
    
    }


    public function insertCommand($num_commande,$date,$montant,$etat,$adresse_livraison,$adresse_facturation,$id_utilisateur){

        $req2 = $this->bdd->prepare("INSERT INTO `commandes`(`num_commande`, `date`, `montant`, `etat`, `adresse_livraison`, `adresse_facturation`, `id_utilisateur`) VALUES (:num_commande,:date,:montant,:etat,:adresse_livraison,:adresse_facturation,:id_utilisateur)");
            $req2->execute(array(
                ':num_commande' => $num_commande,
                ':date' => $date,
                ':montant' => $montant,
                ':etat' => $etat,
                ':adresse_livraison' => $adresse_livraison,
                ':adresse_facturation' => $adresse_facturation,
                ':id_utilisateur' => $id_utilisateur
            ));
            
    }


    // public function setCommande($montant,$livraison,$paiement,$id_user,$id_produit,$num_commande,$quantite){

    //         $date = date("Y-m-d H:i:s");
    //         $etat = "En cours";
    //         $num_commande = rand(0,100000000000);
    //         $request = $this->bdd->prepare("INSERT INTO `commandes`(`num_commande`,`date`, `montant`, `etat`, `adresse_livraison`, `adresse_facturation`, `id_utilisateur`) VALUES (:num_commande, :date, :montant,:etat,:adresse_livraison,:adresse_facturation,:id_utilisateur)");
    //         $request->execute(array(
    //             ':num_commande' => $num_commande,
    //             ':date' => $date,
    //             ':montant' => $montant,
    //             ':etat' => $etat,
    //             ':adresse_livraison' => $livraison,
    //             ':adresse_facturation' => $paiement,
    //             ':id_utilisateur' => $id_user
    //         ));

    //         $req = $this->bdd->prepare("INSERT INTO `produit_commande`(`id_produits`, `num_commande`, `quantite`) VALUES (:id_produit,:num_commande,:quantite)");
    //         $req->execute(array(
    //             ':id_produit' => $id_produit,
    //             ':num_commande' => $num_commande,
    //             ':id_produit' => $quantite
    //         ));
    // }
}



// creation class commande et back_modifier_historique.php et modifier_historique.php
// deplacement des requet historique-admin.php et historique.php dans Commande.php depuis Produit.php
// modification page back_historique-admin.php et back_historique.php