<?php
$contact = new Contact();

if (isset($_POST['submit'])) {

    $nom = $_POST['nom'];
    $sujet = $_POST['sujet'];
    $message = $_POST['message'];

    if (!empty($nom) && !empty($sujet) && !empty($message)) {

        $contact->InsertContact($nom,$sujet, $message);

        echo 'Votre mesage à été envoyer avec succès.<br> Vous recevrez une reponse par mail';
    } else {
        echo 'Vous devez remplir correctement tous les champs.';
    }
}
