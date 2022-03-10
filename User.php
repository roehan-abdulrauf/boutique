<?php
class User extends Config
{
    private $_id;
    private $_name;
    private $_surname;
    private $_mail;
    private $_id_droits;
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

    public function AdminUpdate($name, $surname, $mail, $id_droits)
    {

        if (!empty($name) && !empty($surname) && !empty($mail) && !empty($id_droits)) {

            $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE mail = '$mail'");
            $res = $req->fetchAll(PDO::FETCH_ASSOC);
            var_dump($res);

            if (count($res)) {

                $req = $this->bdd->prepare("UPDATE `utilisateurs` SET `id_droits`='$id_droits' WHERE mail = '$mail'");
                $req->execute();

                $this->_Malert = 'Les droits de l\'itulisateur ont bien été modifier.';
                $this->_Talert = 1;
            } else {
                $this->_Malert = 'Erreur: Les informations de l\'itulisateur sont soit invalident soit inexistent.';
                $this->_Talert = 2;
            }
        }
    }

    public function getAllInfosById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $user = ['id' => $res[0]['id'], 'login' => $res[0]['login'], 'password' => $res[0]['password']];

        return $user;
    }
}
