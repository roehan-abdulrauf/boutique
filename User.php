<?php

class User extends Config
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
        $req = $this->bdd->prepare("SELECT * FROM `utilisateurs` WHERE mail = ? AND password = ? ");
        $req->execute(array($mail, $password));
        $res = $req->fetch();
        if (count($res)) {
            
            $_SESSION['id'] = $res['id'];
            $_SESSION['mail'] = $mail;
            $_SESSION['password'] = $password;
            

            $this->_id = $_SESSION['id'];
            $this->_mail = $mail;
            $this->_password = $password;
            
            $this->_Malert = 'Connexion réussie, vous allez être redirigé.';
            $this->_Talert = 1;
            header("Refresh:3;url=index.php");
        } else {

            echo "3";
            $this->_Malert = 'Aucun utilisateur trouvé.';
            $this->_Talert = 2;
        }
    }
    public function getId(){
        return $this->_id;
    }

    public function Register($prenom, $nom, $mail, $adresse, $codepostal, $ville, $_password, $_passwordverify)
    {
        $password = hash('sha512', $_password);
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE mail='$mail'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (count($res) == 0) {
            $id_droits1 = 23;
            $id_droits2 = 1;

            if ($_password == $_passwordverify) {

                $req = $this->bdd->prepare("INSERT INTO `utilisateurs`(`nom`,`prenom`,`mail`,`password`,`adresse`,`code_postal`,`ville`,`id_droits`) values('$nom','$prenom','$mail','$password','$adresse','$codepostal','$ville','$id_droits2')");
                $req->execute();

                $this->_Malert = 'Félicitations votre compté a bien été créé, vous pouvez maintenant vous connecter .';
                $this->_Talert = 1;
                header('refresh:3;url=connexion.php');
            } elseif ($mail == 'admin' && $_password == 'admin' && $_password == $_passwordverify) {
                $req = $this->bdd->prepare("INSERT INTO `utilisateurs`(`mail`,`prenom`,`nom`,`adresse`,`code_postal`,`ville`, `password`,`id_droits`) VALUES ('$mail','$prenom','$nom','$adresse','$codepostal','$ville','$password','$id_droits1')");
                $req->execute();
                header('refresh:3;url=connexion.php');
            } else {
                $this->_Malert = 'Vos mots de passe doivent correspondre.';
                $this->_Talert = 2;
            }
        } else {
            $this->_Malert = 'Adresse email déjà utilisée.';
            $this->_Talert = 2;
        }
    }

    public function Update($mail, $prenom, $nom, $adresse, $codepostal, $ville, $password, $passwordverify)
    {
        $requser = $this->bdd->prepare('SELECT * FROM utilisateurs WHERE `mail` = ?');
        $requser->execute(array($mail));
        $userinfo = $requser->fetchAll(PDO::FETCH_ASSOC);


        if (isset($mail) && !empty($mail)) {
            if (count($userinfo)) {

                $this->_Malert = 'L\'adresse mail existe déjà.';
                $this->_Talert = 2;
            } elseif (count($userinfo) == 0) {

                $insertmail = $this->bdd->prepare("UPDATE utilisateurs SET mail = ? WHERE id = ?");
                $insertmail->execute(array($mail, $_SESSION['id']));
                $this->_Malert = 'Votre adresse email a bien été modifiée.';
                $this->_Talert = 1;
                header('refresh:3;url=profil.php');
            } else {
                $this->_Malert = 'Veuillez remplir correctement le champs .';
                $this->_Talert = 2;
                header('Location:profil.php');
            }
        }
        if (isset($prenom) && !empty($prenom)) {

            $insertprenom = $this->bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
            $insertprenom->execute(array($prenom, $_SESSION['id']));
            $this->_Malert = 'Votre prénom a bien été modifiée.';
            $this->_Talert = 1;
            header('refresh:3;url=profil.php');
        }

        if (isset($nom) && !empty($nom)) {

            $insertnom = $this->bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
            $insertnom->execute(array($nom, $_SESSION['id']));
        }

        if (isset($adresse) && !empty($adresse)) {

            $insertadresse = $this->bdd->prepare("UPDATE utilisateurs SET adresse = ? WHERE id = ?");
            $insertadresse->execute(array($adresse, $_SESSION['id']));
        }

        if (isset($codepostal) && !empty($codepostal)) {

            $insertcodepostal = $this->bdd->prepare("UPDATE utilisateurs SET code_postal = ? WHERE id = ?");
            $insertcodepostal->execute(array($codepostal, $_SESSION['id']));
        }

        if (isset($ville) && !empty($ville)) {

            $insertville = $this->bdd->prepare("UPDATE utilisateurs SET ville = ? WHERE id = ?");
            $insertville->execute(array($ville, $_SESSION['id']));
        }

        if (isset($password) && !empty($password) && isset($passwordverify) && !empty($passwordverify)) {

            $newpassword = hash('sha512', $password);

            if ($password == $passwordverify) {

                $insertpassword = $this->bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
                $insertpassword->execute(array($newpassword, $_SESSION['id']));
                unset($_SESSION['fail']);
                header('Location:../html/connexion.php');
            } else {
                $_SESSION['fail'] = '<font color="red">les passwords ne correspondent pas </font>';
                header('Location:profil.php');
            }
        } else {
            $_SESSION['fail'] = '<font color="red"> Tous les champs doivent être complétés</font>';
            header('Location:../html/profil.php');
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

    public function disconnect(){
        
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location:../index.php");
    }


    /*
        GET LES INFOS À PARTIR D'UN ID
    */

    public function getMailById($id)
    {
        $this->id = $id;
        $req = $this->bdd->prepare("SELECT * FROM `utilisateurs` WHERE id= ?");
        $req->execute(array($id));
        $res = $req->fetch();

        $mail = $res['mail'];

        return $mail;
    }

    public function getPrenomById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $prenom = $res[0]['prenom'];

        return $prenom;
    }

    public function getNomById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $nom = $res[0]['nom'];

        return $nom;
    }

    public function getAdresseById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $adresse = $res[0]['adresse'];

        return $adresse;
    }

    public function getCodePostalById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $code_postal = $res[0]['code_postal'];

        return $code_postal;
    }

    public function getVilleById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $ville = $res[0]['ville'];

        return $ville;
    }

    public function getPasswordById($id)
    {
        $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE id='$id'");
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        $password = $res[0]['password'];

        return $password;
    }

    /*
        GET LES INFOS
    */


    public function getAllInfos()
    {
        $user = ['id' => $this->_id, 'mail' => $this->_mail, 'password' => $this->_password, 'nom' => $this->_nom, 'prenom' => $this->_prenom, 'adresse' => $this->_adresse, 'codepostal' => $this->_codepostal, 'ville' => $this->_ville];

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