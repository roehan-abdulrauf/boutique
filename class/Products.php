<?php


require_once 'config.php';

class Products extends Config
{
    
    

    public function getAllProducts($produitsParPage, $current_page){

        // Selection par des produits triés par date 
        $req = $this->bdd->prepare('SELECT * FROM produits ORDER BY date DESC LIMIT ?, ?');
        $req->bindValue(1, ($current_page - 1) * $produitsParPage, PDO::PARAM_INT);
        $req->bindValue(2, $produitsParPage, PDO::PARAM_INT);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


    public function totalProducts(){

        return $totalProduit = $this->bdd->query('SELECT * FROM produits')->rowCount();
    }


    public function bestSales(){

        // recupere les articles les plus vendu
        $ventes = $this->bdd->prepare('SELECT * FROM produits ORDER BY date DESC LIMIT 4');
        $ventes->execute();

        return $ventes->fetchAll(PDO::FETCH_ASSOC);
    }


    public function Produit(){

        // Preparation de la requete et execution alternée avec le ? pour eviter les injection sql
        $req = $this->bdd->prepare('SELECT * FROM produits WHERE id = ?');
        $req->execute([$_GET['id']]);

        // Fetch la requete précedente et mettre dans un tableau associatif
        return $req->fetch(PDO::FETCH_ASSOC);
    }


    public function catProduits($current_page,$produitsParPage){

        // Selection des produits triés par date et en fonction de leur categorie
        $req = $this->bdd->prepare('SELECT * FROM produits WHERE id_categorie = ? ORDER BY date DESC LIMIT ?,?');

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
        $total = $this->bdd->prepare('SELECT * FROM produits WHERE id_categorie = :categorie');
        $total->bindValue(':categorie',$_GET['cat'], PDO::PARAM_INT);
        $total->execute();
        return $total->rowCount();
    }


    public function getComments(){ 
        // select commentaires.commentaire, utilisateur.prenom FROM 'commentaires' INNER JOIN utilisateur ON utilisateur.id = commentaire.id_utilisateur WHERE id_porduits = :idproduit
        // recuperer les commentaires
        $com = $this->bdd->prepare('SELECT commentaires.commentaire, utilisateur.prenom FROM commentaires INNER JOIN utilisateur ON utilisateur.id = commentaires.id_utilisateur WHERE id_produit = :idproduit');
        $com->bindValue(':idproduit',$_GET['id'],PDO::PARAM_INT);
        $com->execute();

        return $com->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function getStock($id_produit_panier){

        
        $req = $this->bdd->prepare('SELECT `quantite` FROM `produits` WHERE id = :id_produit');
        $req->bindValue(':id_produit',$id_produit_panier,PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch();

        return $res;

        
    }

    public function updateStock($res,$quantite_produit_panier,$id_produit_panier){


        $stock = $res - $quantite_produit_panier;
        $req2 = $this->bdd->prepare('UPDATE `produits` SET `quantite`= :quantite WHERE id = :id_produit');
        $req2->bindValue(':quantite',$stock,PDO::PARAM_INT);
        $req2->bindValue(':id_produit',$id_produit_panier,PDO::PARAM_INT);
        $req2->execute();
    }



}