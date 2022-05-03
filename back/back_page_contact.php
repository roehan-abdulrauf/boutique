<?php
$contact = new Contact();

if (isset($_POST['submit'])) {

    $nom = htmlspecialchars($_POST['nom']);
    $sujet = htmlspecialchars($_POST['sujet']);
    $message = htmlspecialchars($_POST['message']);

    if (!empty($nom) && !empty($sujet) && !empty($message)) {

        $contact->InsertContact($sujet, $message,$_SESSION['id']);

        echo 'Votre mesage à été envoyer avec succès.<br> Vous recevrez une reponse par mail';
    } else {
        echo 'Vous devez remplir correctement tous les champs.';
    }
}
