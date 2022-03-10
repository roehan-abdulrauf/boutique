<?php

require_once 'Bdd.php';

class Products extends Bdd
{
    
    

    public function getAllProducts($produitsParPage, $current_page){

        // Selection par des produits triés par date 
        $req = $this->connect()->prepare('SELECT * FROM `produits` ORDER BY `produits`.`vendu` DESC LIMIT ?, ?');
        $req->bindValue(1, ($current_page - 1) * $produitsParPage, PDO::PARAM_INT);
        $req->bindValue(2, $produitsParPage, PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public function totalProducts(){

        return $totalProduit = $this->connect()->query('SELECT * FROM produits')->rowCount();
    }


    public function bestSales(){

        // recupere les articles les plus vendu
        $ventes = $this->connect()->prepare('SELECT * FROM produits ORDER BY vendu DESC LIMIT 4');
        $ventes->execute();

        return $ventes->fetchAll(PDO::FETCH_ASSOC);
    }


    public function Produit(){

        // Preparation de la requete et execution alternée avec le ? pour eviter les injection sql
        $req = $this->connect()->prepare('SELECT * FROM produits WHERE id = ?');
        $req->execute([$_GET['id']]);

        // Fetch la requete précedente et mettre dans un tableau associatif
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function catProduits($current_page,$produitsParPage){

        // Selection des produits triés par date et en fonction de leur categorie
        $req = $this->connect()->prepare('SELECT * FROM produits WHERE id_cat = ? ORDER BY "date" DESC LIMIT ?,?');

        // On ajoute les variables dans la requete grace à bindvalue
        $req->bindValue(1,$_GET['cat'] , PDO::PARAM_INT);
        $req->bindValue(2, ($current_page - 1) * $produitsParPage, PDO::PARAM_INT);
        $req->bindValue(3, $produitsParPage, PDO::PARAM_INT);
        $req->execute();

        // Fetch les produits et mettre les resultats dans un tableau assiociatif
        return $req->fetchAll(PDO::FETCH_ASSOC);

    }


    public function totalCat(){
        // Recuperer le total de produits en fonction de leur categorie
        $total = $this->connect()->prepare('SELECT * FROM produits WHERE id_cat = :categorie');
        $total->bindValue(':categorie',$_GET['cat'], PDO::PARAM_INT);
        $total->execute();
        return $total->rowCount();
    }


    public function getComments(){ 

        // recuperer les commentaires
        $com = $this->connect()->prepare('SELECT commentaires.commentaire, utlisateur.prenom FROM `commentaires`INNER JOIN utilisateur WHERE commentaires.id_produit = :idproduit ');
        $com->bindValue(':idproduit',$_GET['id'],PDO::PARAM_INT);
        $com->execute();

        return $com->fetchAll(PDO::FETCH_ASSOC);
    }

    
    



}