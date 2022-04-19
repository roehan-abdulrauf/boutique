<?php

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

    public function Contacts($nom, $email, $numero, $sujet, $message)
    {
        $this->_nom = $nom;
        $this->_email = $email;
        $this->_numero = $numero;
        $this->_sujet = $sujet;
        $this->_message = $message;
        
            if (!empty($nom) && !empty($email) && !empty($numero) && !empty($sujet) && !empty($message)) {

                $req = $this->bdd->prepare("INSERT INTO `contacts`(`nom-prenom`, `email`,`numero`, `sujet`,`message`) VALUES ('$nom','$email','$numero','$sujet','$message')");
                $req->execute();
                // $db_user = 'root';
                // $db_pass = '';
                // $dbh = new PDO ('mysql:host=localhost;dbname=boutique', $db_user, $db_pass);
                // $req = $dbh->prepare("INSERT INTO `contacts`(`nom-prenom`, `email`,`numero`, `sujet`,`message`) VALUE ('$nom','$email','$numero','$sujet','$message')");
                // $req->execute();

                $this->_Malert = 'Votre mesage à été envoyer avec succès.';
                $this->_Talert = 1;

                header('refresh:3;url= page contact.php');

            } else {
                $this->_Malert = 'Vous devez remplir correctement tous les champs.';
                $this->_Talert = 2;
            }
        }
    }

