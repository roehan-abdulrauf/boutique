<?php
// Check si l'id du produit est bien dans l'url
if (isset($_GET['id'])&& is_numeric($_GET['id'])&& $_GET['id'] > 0 ) {

    $objet = new Products;
    $produit = $objet->Produit();

    $comments = $objet ->getComments();
    var_dump($comments);
    foreach($comments as $comment){
        var_dump($comment);
        $idUser = $comment['id_utilisateur'];
    }

    
    
}
?>