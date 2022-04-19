<?php

$commentaire = new Commentaire();
$getcommentaire = $commentaire->getCommentaires();

if (isset($_GET['action']) && $_GET['action'] == "suppression") {
    $comment = new Commentaire();
    $modifcommentaire = $comment->getModifCommentaire();
    // var_dump($modifcommentaire);
    if (count($modifcommentaire)) {
        $comment = new Commentaire();
    $suppcommentaire = $comment->getSuppCommentaire();
    // var_dump($suppcommentaire);
    header('location:index.php?page=commentaire-admin.php');
    }
}

?>