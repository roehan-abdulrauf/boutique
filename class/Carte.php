<?php

class Carte extends Config
{
    public $_numero_carte;
    public $_nom_carte;
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

    public function RegisterCarte($numero_carte, $nom_carte, $mois_carte, $annee_carte, $cvv, $enregistrer_carte)
    {

        if (!empty($numero_carte) && !empty($nom_carte) && !empty($mois_carte) && !empty($annee_carte) && !empty($cvv)) {
            echo 1;
            if ($enregistrer_carte) {
                echo 2;
                $enregistrer_carte = "oui";

                $numero_carte = crypt($numero_carte, 'carte_bancaire');

                $nom_carte = strtoupper($nom_carte);

                $req = $this->bdd->prepare("INSERT INTO cartes_bancaires (numero_carte, nom_carte, enregistrer_carte) VALUES ('$numero_carte','$nom_carte','$enregistrer_carte')");
                $req->execute();
                var_dump($req);
                var_dump($req->execute());
                // $db_user = 'root';
                // $db_pass = '';
                // $dbh = new PDO ('mysql:host=localhost;dbname=boutique', $db_user, $db_pass);
                // $req = $dbh->prepare("INSERT INTO `contacts`(`nom-prenom`, `email`,`numero`, `sujet`,`message`) VALUE ('$nom','$email','$numero','$sujet','$message')");
                // $req->execute();
            } else {
                echo 3;
                $enregistrer_carte = "non";

                $numero_carte = crypt($numero_carte, 'carte_bancaire');

                $req = $this->bdd->prepare("INSERT INTO cartes_bancaires (numero_carte, nom_carte, enregistrer_carte) VALUES (':numero_carte',':nom_carte',':enregistrer_carte')");
                $req->execute(array(
                    ':numero_carte' => $numero_carte,
                    ':nom_carte' => $nom_carte,
                    ':enregistrer_carte' => $enregistrer_carte,
                ));
                var_dump($req);
                var_dump($req->execute());
            }

        } else {
            echo 4;
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }
}