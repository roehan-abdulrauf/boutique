<?php

require_once 'config.php';

class Panier extends Config
{

    public function getProduit($id){

        // Recupere le produit avec l'id correspondant
        $req = $this->bdd->prepare('SELECT * FROM produits WHERE id = ?');
        $req->execute([$id]);

        // Fetch le produit et mettre le resultat dans un tableau associatif
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function deleteProduct(){

        unset($_SESSION['panier'][$_GET['remove']]);
        header('location: index.php');
    }


    public function payment($id_produit_panier,$num_commande,$quantite_produit_panier){

            
            $req = $this->bdd->prepare("INSERT INTO `produit_commande`(`id_produits`, `num_commande`, `quantite`) VALUES (:id_produit,:num_commande,:quantite)");
            $req->execute(array(
                ':id_produit' => $id_produit_panier,
                ':num_commande' => $num_commande,
                ':quantite' => $quantite_produit_panier
            ));
            echo 'table produit commande ok';
        
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


    public function produitsPanier($products_in_cart){

        // Il y a des produits dans le panier donc on doit les recuperer depuis la database
        $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
        $req = $this->bdd->prepare('SELECT * FROM produits WHERE id IN (' . $array_to_question_marks . ')');

        // les keys sont les id des produits
        $req->execute(array_keys($products_in_cart));

        // Fetch les produits dans un tableau associatif
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}