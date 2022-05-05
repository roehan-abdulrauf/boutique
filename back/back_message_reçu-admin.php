<?php

$contact = new Contact();
$getcontact = $contact->getContact();

if (isset($_GET['action']) && $_GET['action'] == "suppression") {
    $comment = new Contact();
    $modifcommentaire = $comment->getContactByid();
    // var_dump($modifcommentaire);
    if (count($modifcommentaire)) {
        $comment = new Contact();
    $suppcommentaire = $comment->getSuppContact();
    // var_dump($suppcommentaire);
    // header('location:index.php?page=message_reçu-admin');
    }
}
?>