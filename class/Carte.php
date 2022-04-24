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

                $req = $this->bdd->prepare("INSERT INTO cartes_bancaires (numero_carte, nom_carte, enregistrer_carte, id_utilisateur, id_commande) VALUES (':numero_carte',':nom_carte',':enregistrer_carte',':id_utilisateur', ':id_commande')");
                $req->execute(array(
                    ':numero_carte' => $numero_carte,
                    ':nom_carte' => $nom_carte,
                    ':enregistrer_carte' => $enregistrer_carte,
                    ':id_utilisateur' => $_SESSION['id'],
                    ':id_commande' => 1,
                ));
                $this->_numero_carte = $numero_carte;
                $this->_nom_carte = $nom_carte;
                var_dump($req);
                var_dump($req->execute());
            }
            //  else {
            //     echo 3;
            //     $enregistrer_carte = "non";

            //     $numero_carte = crypt($numero_carte, 'carte_bancaire');

            //     $req = $this->bdd->prepare("INSERT INTO cartes_bancaires (numero_carte, nom_carte, enregistrer_carte, id_utilisateur, id_commande) VALUES (':numero_carte',':nom_carte',':enregistrer_carte',':id_utilisateur', ':id_commande')");
            //     $req->execute(array(
            //         ':numero_carte' => $numero_carte,
            //         ':nom_carte' => $nom_carte,
            //         ':enregistrer_carte' => $enregistrer_carte,
            //         ':id_utilisateur' => $_SESSION['id'],
            //         ':id_commande' => 2,
            //     ));
            //     var_dump($req);
            //     var_dump($req->execute());
            // }
        } else {
            echo 4;
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }
}
