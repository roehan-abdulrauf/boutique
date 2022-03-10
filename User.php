<?php
require('config.php');

class User
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_adresse;
    private $_codepostal;
    private $_ville;
    private $_password;
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

    public function Connect($mail, $_password)
    {
        $password = hash('sha512', $_password);
        $req = $GLOBALS['bdd']->prepare("SELECT * FROM `utilisateurs` WHERE mail = ? AND password = ? ");
        $req->execute(array($mail, $password));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        if (count($res)) {
            header('Refresh:3;url=profil.php');
            $_SESSION['id'] = $res[0]['id'];
            $_SESSION['mail'] = $mail;
            $_SESSION['password'] = $password;

            $this->_id = $_SESSION['id'];
            $this->_mail = $mail;
            $this->_password = $password;

            $this->_Malert = 'Connexion réussie, vous allez être redirigé.';
            $this->_Talert = 1;

        } else {

            echo "3";
            $this->_Malert = 'Aucun utilisateur trouvé.';
            $this->_Talert = 2;
        }
    }

    public function Register($prenom, $nom, $mail, $adresse, $codepostal, $ville, $_password, $_passwordverify)
    {   
        $password = hash('sha512', $_password);
        $req = $GLOBALS['bdd']->query("SELECT * FROM `utilisateurs` WHERE mail='$mail'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($res) == 0 ) {
            $id_droits1 = 23;
            $id_droits2 = 1;
        
            if ($_password == $_passwordverify) {

                $req = $GLOBALS['bdd']->prepare("INSERT INTO `utilisateurs`(`nom`,`prenom`,`mail`,`password`,`adresse`,`code_postal`,`ville`,`id_droits`) values('$nom','$prenom','$mail','$password','$adresse','$codepostal','$ville','$id_droits2')");
                $req->execute();

                $this->_Malert = 'Félicitations votre compté a bien été créé, vous pouvez maintenant vous connecter .';
                $this->_Talert = 1;
                header('refresh:3;url=index.php');
            }elseif ($mail == 'admin' && $_password == 'admin' && $_password == $_passwordverify) {
                $req = $GLOBALS['bdd']->prepare("INSERT INTO `utilisateurs`(`mail`,`prenom`,`nom`,`adresse`,`code_postal`,`ville`, `password`,`id_droits`) VALUES ('$mail','$prenom','$nom','$adresse','$codepostal','$ville','$password','$id_droits1')");
                $req->execute();
                header('refresh:3;url=index.php');
            } 
            else {
                $this->_Malert = 'Vos mots de passe doivent correspondre.';
                $this->_Talert = 2;
            }
        }
        else{
            $this->_Malert = 'Adresse email déjà utilisée.';
            $this->_Talert = 2;
        }
    }

    public function Update($mail,$prenom,$nom,$adresse,$codepostal,$ville,$password,$passwordverify)
    {
        $reqLogin = $GLOBALS['bdd']->query("SELECT * FROM `utilisateurs` WHERE mail='$mail'");
        $res = $reqLogin->fetchAll(PDO::FETCH_ASSOC);

        if (($mail != $_SESSION['mail']) && ($password != $_SESSION['password'])) {
            if (!count($res)) {
                if ($password == $passwordverify) {
                    $req = $GLOBALS['bdd']->prepare("UPDATE `utilisateurs` SET `prenom`='$prenom', `nom`='$nom',`adresse`='$adresse',`codepostal`='$codepostal',`ville`='$ville',`password`='$password' WHERE id='" . $_SESSION['id'] . "'");
                    $req->execute();

                    $_SESSION['mail'] = $mail;
                    $_SESSION['password'] = $password;

                    $this->_Malert = 'Félicitations, vos informations ont été changées.';
                    $this->_Talert = 1;
                } else {
                    $this->_Malert = 'Vos mots de passe doivent être identiques.';
                    $this->_Talert = 2;
                }
            }
        } else if ($mail != $_SESSION['login']) {
            if (!count($res)) {
                $req = $GLOBALS['bdd']->prepare("UPDATE `utilisateurs` SET `mail`='$mail' WHERE id='" . $_SESSION['id'] . "'");
                $req->execute();

                $_SESSION['mail'] = $mail;

                $this->_Malert = 'Félicitation, votre nom adresse email à été modifiée.';
                $this->_Talert = 1;
            } else {
                $this->_Malert = 'L\'adresse email est déjà utilisée.';
                $this->_Talert = 2;
            }
        } else if ($password != $_SESSION['password']) {
            if ($password == $passwordverify) {
                $req = $GLOBALS['bdd']->prepare("UPDATE `utilisateurs` SET `password`='$password' WHERE id='" . $_SESSION['id'] . "'");
                $req->execute();

                $_SESSION['password'] = $password;
                $this->_Malert = 'Félicitations, votre mot de passe à été modifié.';
                $this->_Talert = 1;
            } else {
                $this->_Malert = 'Vos mots de passe doivent correspondre.';
                $this->_Talert = 2;
            }
        }
    }

    /*
        GET LES INFOS À PARTIR D'UN ID
    */

    public function getAllInfosById($id)
    {
        $req = $GLOBALS['bdd']->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $user = ['id' => $res[0]['id'], 'mail' => $res[0]['mail'], 'password' => $res[0]['password']];

        return $user;
    }

    public function getLoginById($id)
    {
        $req = $GLOBALS['bdd']->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $mail = $res[0]['mail'];

        return $mail;
    }

    public function getPasswordById($id)
    {
        $req = $GLOBALS['bdd']->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $password = $res[0]['password'];

        return $password;
    }

    /*
        GET LES INFOS
    */


    public function getAllInfos()
    {
        $user = ['id' => $this->_id, 'mail' => $this->_mail, 'password' => $this->_password,'nom' => $this->_nom, 'prenom' => $this->_prenom,'adresse' => $this->_adresse,'codepostal' => $this->_codepostal,'ville' => $this->_ville ];

        return $user;
    }

    public function getmail()
    {
        $mail = $this->_mail;

        return $mail;
    }

    public function getPassword()
    {
        $password = $this->_password;

        return $password;
    }
}
