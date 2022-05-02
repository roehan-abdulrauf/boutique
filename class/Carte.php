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

    public function RegisterCarte($numero_carte, $nom_carte,$enregistrer_carte)
    {

        $req = $this->bdd->prepare("INSERT INTO cartes_bancaires (`numero_carte`, `nom_carte`, `enregistrer_carte`, `id_utilisateur`) VALUES (:numero_carte, :nom_carte, :enregistrer_carte, :id_utilisateur)");
        $req->execute(array(
            ':numero_carte' => $numero_carte,
            ':nom_carte' => $nom_carte,
            ':enregistrer_carte' => $enregistrer_carte,
            ':id_utilisateur' => $_SESSION['id'],
        ));
        $this->_numero_carte = $numero_carte;
        $this->_nom_carte = $nom_carte;
    }
}