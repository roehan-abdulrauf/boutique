<?php

require_once 'config.php';

class Contact extends Config
{
    public $_nom;
    public $_email;
    public $_numero;
    public $_sujet;
    public $_message;
    private $_Malert;
    private $_Talert;

    public function alerts()
    {
        if ($this->_Talert == 1) {
            echo "<div class='succes'>" . $this->_Malert . "</div>";
        } else {
            echo "<div class='error'>" . $this->_Malert . "</div>";
        }
    }

    public function InsertContact($sujet, $message,$session)
    {
        $req = $this->bdd->prepare("INSERT INTO `contacts`(`sujet`,`message`,`id_utilisateur`) VALUES (:sujet,:message,:id_utilisateur)");
        $req->execute(array(
            ':sujet' => $sujet,
            ':message' => $message,
            ':id_utilisateur' => $session
        ));
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContact()
    {
        $req = $this->bdd->prepare("SELECT * FROM `contacts` INNER JOIN utilisateurs WHERE contacts.id_utilisateur = utilisateurs.id");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactByid()
    {
        $check = $this->bdd->prepare("SELECT * FROM `contacts` WHERE id_contact = ?");
        $check->execute(array($_GET['id']));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSuppContact()
    {

        $req = $this->bdd->prepare("DELETE FROM `contacts` WHERE id_contact = ?");
        $req->execute(array($_GET['id']));
    }
}

