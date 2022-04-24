<?php


class Adresse extends Config
{
    public $_nom_prenom;
    public $_numero;
    public $_adresse;
    public $_complement_adresse;
    public $_code_postale;
    public $_ville;
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

    public function AdresseFacturation($nom_prenom, $numero, $adresse, $complement_adresse, $code_postale, $ville)
    {

        if (!empty($nom_prenom) && !empty($numero) && !empty($adresse) && !empty($code_postale) && !empty($ville)) {
            echo 1;
            $nom_prenom = strtoupper($nom_prenom);
            $adresse = strtoupper($adresse);
            $complement_adresse = strtoupper($complement_adresse);
            $ville = strtoupper($ville);

            if ($complement_adresse) {
                echo 2;
                $req = $this->bdd->prepare("INSERT INTO adresses_facturations (nom_prenom, numero, adresse, complement_adresse, code_postale, ville) VALUES (:nom_prenom, :numero, :adresse, :complement_adresse, :code_postale, :ville)");
                $req->execute(
                    array(
                        ':nom_prenom' => $nom_prenom,
                        ':numero' => $numero,
                        ':adresse' => $adresse,
                        ':complement_adresse' => $complement_adresse,
                        ':code_postale' => $code_postale,
                        ':ville' => $ville,
                    )
                );
                var_dump($req);
                var_dump($req->execute());
            } elseif (empty($complement_adresse)) {
                echo 3;
                $req = $this->bdd->prepare("INSERT INTO adresses_facturations (nom_prenom, numero, adresse, complement_adresse, code_postale, ville) VALUES (:nom_prenom, :numero, :adresse, :complement_adresse, :code_postale, :ville)");
                $req->execute(array(
                    ':nom_prenom' => $nom_prenom,
                    ':numero' => $numero,
                    ':adresse' => $adresse,
                    ':complement_adresse' => $complement_adresse,
                    ':code_postale' => $code_postale,
                    ':ville' => $ville,
                ));
                var_dump($req);
                var_dump($req->execute());
            }

            // header('refresh:3;url= page contact.php');

        } else {
            echo 4;
            $this->_Malert = 'Vous devez remplir correctement tous les champs.';
            $this->_Talert = 2;
        }
    }

    public function AdresseLivraison($nom_prenom, $numero, $adresse, $complement_adresse, $code_postale, $ville)
    {

        if (!empty($nom_prenom) && !empty($numero) && !empty($adresse) && !empty($code_postale) && !empty($ville)) {
            echo 1;
            $nom_prenom = strtoupper($nom_prenom);
            $adresse = strtoupper($adresse);
            $complement_adresse = strtoupper($complement_adresse);
            $ville = strtoupper($ville);

            if ($complement_adresse) {
                echo 2;
                $req = $this->bdd->prepare("INSERT INTO adresses_livraisons (nom_prenom, numero, adresse, complement_adresse, code_postale, ville) VALUES (:nom_prenom, :numero, :adresse, :complement_adresse, :code_postale, :ville)");
                $req->execute(array(
                    ':nom_prenom' => $nom_prenom,
                    ':numero' => $numero,
                    ':adresse' => $adresse,
                    ':complement_adresse' => $complement_adresse,
                    ':code_postale' => $code_postale,
                    ':ville' => $ville,
                ));
                var_dump($req);
                var_dump($req->execute());
            } elseif (empty($complement_adresse)) {
                echo 3;
                $req = $this->bdd->prepare("INSERT INTO adresses_livraisons (nom_prenom, numero, adresse, complement_adresse, code_postale, ville) VALUES (:nom_prenom,:numero,:adresse,:complement_adresse,:code_postale,:ville)");
                $req->execute(array(
                    ':nom_prenom' => $nom_prenom,
                    ':numero' => $numero,
                    ':adresse' => $adresse,
                    ':complement_adresse' => $complement_adresse,
                    ':code_postale' => $code_postale,
                    ':ville' => $ville,
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