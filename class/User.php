<?php
require_once 'config.php';
class User extends Config
{
    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_adresse;
    private $_codepostal;
    private $_ville;
    private $_droits;
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

    public function Connect($mail, $password)
    {
        $req = $this->bdd->prepare("SELECT * FROM `utilisateurs` WHERE mail = ?");
        $req->execute(array($mail));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        
        $password = hash('sha512', $password);
        if (count($res)) {

            if (!empty($mail) && !empty($password)) {

                if ($password == $res[0]['password']) {

                    $this->_id = $res[0]['id'];
                    $this->_mail =  $res[0]['mail'];
                    $this->_prenom = $res[0]['prenom'];
                    $this->_nom = $res[0]['nom'];
                    $this->_adresse = $res[0]['adresse'];
                    $this->_codepostal = $res[0]['code_postal'];
                    $this->_ville = $res[0]['ville'];
                    $this->_droits = $res[0]['id_droit'];

                    $this->_Malert = 'Connexion réussie, vous allez être redirigé.';
                    $this->_Talert = 1;

                    header("Refresh:3;url=index.php");
                } else {

                    echo "2";
                    $this->_Malert = 'Mot de passe incorrect';
                    $this->_Talert = 2;
                }
            }
        } else {

            echo "3";
            $this->_Malert = 'Aucun utilisateur trouvé';
            $this->_Talert = 2;
        }
    }

    public function Register($prenom, $nom, $mail, $adresse, $code_postal, $ville, $password, $passwordverify)
    {
        $req = $this->bdd->prepare("SELECT * FROM `utilisateurs` WHERE mail= ?");
        $req->execute(array($mail));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

        if (count($res) == 0) {
            $id_droits1 = 23;
            $id_droits2 = 1;

            if ($password == $passwordverify) {
                $password = hash('sha512', $password);
                $req = $this->bdd->prepare("INSERT INTO `utilisateurs`(`nom`,`prenom`,`mail`,`password`,`adresse`,`code_postal`,`ville`,`id_droit`) values (:nom, :prenom, :mail, :password, :adresse, :code_postal, :ville, :id_droit)");
                $req->execute(array(
                    ':nom' => $nom,
                    ':prenom' => $prenom,
                    ':mail' => $mail,
                    ':password' => $password,
                    ':adresse' => $adresse,
                    ':code_postal' => $code_postal,
                    ':ville' => $ville,
                    ':id_droit' => $id_droits2,
                ));

                $this->_Malert = 'Félicitations votre compté a bien été créé, vous pouvez maintenant vous connecter .';
                $this->_Talert = 1;
                header('refresh:3;url=index.php?page=connexion');
            } elseif ($mail == 'admin' && $password == 'admin' && $password == $passwordverify) {
                $password = hash('sha512', $password);
                $req = $this->bdd->prepare("INSERT INTO `utilisateurs`(`nom`,`prenom`,`mail`,`password`,`adresse`,`code_postal`,`ville`,`id_droit`) VALUES (:nom, :prenom, :mail, :password, :adresse, :code_postal, :ville, :id_droit)");
                $req->execute(
                    array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':mail' => $mail,
                        ':password' => $password,
                        ':adresse' => $adresse,
                        ':code_postal' => $code_postal,
                        ':ville' => $ville,
                        ':id_droit' => $id_droits1,
                    )
                );
                header('refresh:3;url=index.php?page=connexion');
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

        $requser = $this->bdd->prepare("SELECT * FROM utilisateurs WHERE `mail` = ? ");
        $requser->execute(array($mail));
        $userinfo = $requser->fetchAll(PDO::FETCH_ASSOC);

        if (isset($mail) && !empty($mail)) {
            if ($mail != $_SESSION['mail']) {
                if (count($userinfo)) {

                    $this->_Malert = '<font color="red">L\'adresse mail existe déjà</font>';
                    $this->_Talert = 2;
                } elseif (count($userinfo) == 0) {

                    $insertmail = $this->bdd->prepare("UPDATE utilisateurs SET mail = ? WHERE id = ?");
                    $insertmail->execute(array($mail, $_SESSION['id']));
                    $this->_Malert = '<font color="green"> Profil modifié avec succès </font>';
                    $this->_Talert = 1;
                    $_SESSION['mail']=$mail;
                    header('refresh:3;url=index.php?page=profil.php');
                } else {
                    $this->_Malert = 'Veuillez remplir correctement le champs .';
                    $this->_Talert = 2;
                    header('refresh:3;url=index.php?page=profil.php');
                }
            }
        }
        if (isset($prenom) && !empty($prenom)) {

            if ($prenom != $_SESSION['prenom']) {

                $insertprenom = $this->bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
                $insertprenom->execute(array($prenom, $_SESSION['id']));
                $this->_Malert = '<font color="green">Profil modifié avec succès</font>';
                $this->_Talert = 1;
                $_SESSION['prenom']=$prenom;
                header('refresh:3;url=index.php?page=profil');
            }
        }

        if (isset($nom) && !empty($nom)) {
            if ($nom != $_SESSION['nom']) {
                $insertnom = $this->bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
                $insertnom->execute(array($nom, $_SESSION['id']));
                $this->_Malert = '<font color="Profil modifié avec succès</font>';
                $this->_Talert = 1;
                $_SESSION['nom']=$nom;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($adresse) && !empty($adresse)) {
            if ($adresse != $_SESSION['adresse']) {
                $insertadresse = $this->bdd->prepare("UPDATE utilisateurs SET adresse = ? WHERE id = ?");
                $insertadresse->execute(array($adresse, $_SESSION['id']));
                $this->_Malert = '<font color="green">Profil modifié avec succès </font>';
                $this->_Talert = 1;
                $_SESSION['adresse']=$adresse;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($codepostal) && !empty($codepostal)) {
            if ($codepostal != $_SESSION['code_postal']) {
                $insertcodepostal = $this->bdd->prepare("UPDATE utilisateurs SET code_postal = ? WHERE id = ?");
                $insertcodepostal->execute(array($codepostal, $_SESSION['id']));
                $this->_Malert = '<font color="green">Profil modifié avec succès</font>';
                $_SESSION['code_postal']=$codepostal;
                $this->_Talert = 1;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($ville) && !empty($ville)) {
            if ($ville != $_SESSION['ville']) {
                $insertville = $this->bdd->prepare("UPDATE utilisateurs SET ville = ? WHERE id = ?");
                $insertville->execute(array($ville, $_SESSION['id']));
                $this->_Malert = '<font color="green"> Profil modifié avec succès</font>'; 
                $this->_Talert = 1;
                $_SESSION['ville']=$ville;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($password) && !empty($password) && isset($passwordverify) && !empty($passwordverify)) {
            if ($password != $_SESSION['password']) {
                
                if ($password == $passwordverify) {
                    $newpassword = hash('sha512', $password);
                    $insertpassword = $this->bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
                    $insertpassword->execute(array($newpassword, $_SESSION['id']));
                    $this->_Malert = '<font color="green"> Profil modifié avec succès</font>'; 
                    $this->_Talert = 1;
                    
                } elseif($password != $passwordverify) {
                    $this->_Malert = 'text align:center<font color="red"> les passwords ne correspondent pas </font>'; 
                    $this->_Talert = 1;
                    
                }
            }
        } elseif(empty($password) || empty($passwordverify)) {
            
            $this->_Malert =  '<font color="red"> Tous les champs doivent être complétés</font>';
            $this->_Talert = 1;
            
            }
    }

    public function AdminUpdate($id_droit, $mail)
    {

        $req = $this->bdd->prepare("UPDATE `utilisateurs` SET `id_droit`= ? WHERE mail = ?");
        $req->execute(array($id_droit, $mail));
    }
    /*
    GET LES INFOS
    */

    public function getAllInfosAdmin()
    {
        $req = $this->bdd->prepare("SELECT * FROM `utilisateurs` WHERE id = ?");
        $req->execute(array($_GET['id']));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getAllInfos()
    {
        $check = $this->bdd->prepare("SELECT * FROM`utilisateurs`");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        return $res;
    }

    public function getUser()
    {
        $check = $this->bdd->prepare("SELECT * FROM `utilisateurs` WHERE id = ?");
        $check->execute(array($_GET['id']));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSuppUser()
    {

        $req = $this->bdd->prepare("DELETE FROM `utilisateurs` WHERE id =$_GET[id]");
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getId()
    {
        $id = $this->_id;

        return $id;
    }

    public function getNom()
    {
        $nom = $this->_nom;

        return $nom;
    }

    public function getPrenom()
    {
        $prenom = $this->_prenom;

        return $prenom;
    }

    public function getMail()
    {
        $mail = $this->_mail;

        return $mail;
    }

    public function getPassword()
    {
        $password = $this->_password;

        return $password;
    }

    public function getAdresse()
    {
        $adresse = $this->_adresse;

        return $adresse;
    }

    public function getCodepostal()
    {
        $codepostal = $this->_codepostal;

        return $codepostal;
    }

    public function getVille()
    {
        $ville = $this->_ville;

        return $ville;
    }

    public function getDroits()
    {
        $droits = $this->_droits;

        return $droits;
    }

    public function disconnect()
    {
        $_SESSION = array();
        session_destroy();
    }

    public function GetOrderHistoryById()
    {
        $id = $_SESSION['id'];
        $req = $this->bdd->prepare("SELECT * FROM `commandes` WHERE id_utilisateurs=?");
        $req->execute(array($id));
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        
    }

    public function password(){

        $id = $_SESSION['id'];
        $req = $this->bdd->prepare("SELECT password FROM `utilisateurs` WHERE id=?");
        $req->execute(array($id));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}
