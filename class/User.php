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
    private $_password;
    private $_Malert;
    private $_Talert;
    private $_droits;

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

        // var_dump($res);
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

                    $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Connexion réussie, vous allez être redirigé</p>';
                    $this->_Talert = 1;

                    header("Refresh:3;url=index.php");
                } else {
                    echo "2";
                    $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* Mot de passe incorrect</p>';
                    $this->_Talert = 2;
                }
            }
        } else {
            $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* Aucun utilisateur trouvé</p>';
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

            if ($mail != htmlspecialchars('admin@gmail.com') && $password == $passwordverify) {
                if (preg_match('#^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[-+!*$@%_])([-+!*$@%_\w]{8,35})$#', $password)) {
                    $password = hash('sha512', $password);
                    $req = $this->bdd->prepare("INSERT INTO `utilisateurs`(`nom`,`prenom`,`mail`,`password`,`adresse`,`code_postal`,`ville`,`id_droit`) values (:nom, :prenom, :mail, :password, :adresse, :code_postal, :ville, :id_droits)");
                    $i=$req->execute(array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':mail' => $mail,
                        ':password' => $password,
                        ':adresse' => $adresse,
                        ':code_postal' => $code_postal,
                        ':ville' => $ville,
                        ':id_droits' => $id_droits2,
                    ));
                    var_dump($i);
                    echo 1;
                    $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Votre compte a été créé avec succès, vous pouvez maintenant vous connecter </p>';
                    $this->_Talert = 1;
                    header('refresh:3;url=index.php?page=connexion');
                } else {$this->_Malert =' <p style="color:red;font-size:120%;text-align:center">Le mot de passe doit contenir : <br> au moins 8 caractères <br>
                au moins une lettre minuscule <br>
                au moins une lettre majuscule <br>
                au moins un chiffre <br>
                au moins l\'un de ces caractères spéciaux: $ @ % * + - _ !<br>
                <strong><p>';}

            } elseif ($mail == htmlspecialchars('admin@gmail.com') && $password == $passwordverify) {
                $password = hash('sha512', $password);
                $req = $this->bdd->prepare("INSERT INTO `utilisateurs`(`nom`,`prenom`,`mail`,`password`,`adresse`,`code_postal`,`ville`,`id_droit`) VALUES (:nom, :prenom, :mail, :password, :adresse, :code_postal, :ville, :id_droits)");
                $i=$req->execute(
                    array(
                        ':nom' => $nom,
                        ':prenom' => $prenom,
                        ':mail' => $mail,
                        ':password' => $password,
                        ':adresse' => $adresse,
                        ':code_postal' => $code_postal,
                        ':ville' => $ville,
                        ':id_droits' => $id_droits1,
                    )
                    
                );
                var_dump($i);
                echo 2;
                header('refresh:1;url=connexion');
            } else {
                $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* Vos mots de passe doivent correspondre</p>';
                $this->_Talert = 2;
            }
        } else {
            $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* Adresse email déjà utilisée ou mot de passe incorrect</p>';
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

                    $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* L\'adresse mail existe déjà </p>';
                    $this->_Talert = 2;
                } elseif (count($userinfo) == 0) {

                    $insertmail = $this->bdd->prepare("UPDATE utilisateurs SET mail = ? WHERE id = ?");
                    $insertmail->execute(array($mail, $_SESSION['id']));
                    $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                    $this->_Talert = 1;
                    $_SESSION['mail'] = $mail;
                    header('refresh:3;url=index.php?page=profil.php');
                } else {
                    $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* Veuillez remplir correctement le champs </p>';
                    $this->_Talert = 2;
                    header('refresh:3;url=index.php?page=profil.php');
                }
            }
        }
        if (isset($prenom) && !empty($prenom)) {

            if ($prenom != $_SESSION['prenom']) {

                $insertprenom = $this->bdd->prepare("UPDATE utilisateurs SET prenom = ? WHERE id = ?");
                $insertprenom->execute(array($prenom, $_SESSION['id']));
                $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                $this->_Talert = 1;
                $_SESSION['prenom'] = $prenom;
                header('refresh:3;url=index.php?page=profil');
            }
        }

        if (isset($nom) && !empty($nom)) {
            if ($nom != $_SESSION['nom']) {
                $insertnom = $this->bdd->prepare("UPDATE utilisateurs SET nom = ? WHERE id = ?");
                $insertnom->execute(array($nom, $_SESSION['id']));
                $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                $this->_Talert = 1;
                $_SESSION['nom'] = $nom;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($adresse) && !empty($adresse)) {
            if ($adresse != $_SESSION['adresse']) {
                $insertadresse = $this->bdd->prepare("UPDATE utilisateurs SET adresse = ? WHERE id = ?");
                $insertadresse->execute(array($adresse, $_SESSION['id']));
                $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                $this->_Talert = 1;
                $_SESSION['adresse'] = $adresse;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($codepostal) && !empty($codepostal)) {
            if ($codepostal != $_SESSION['code_postal']) {
                $insertcodepostal = $this->bdd->prepare("UPDATE utilisateurs SET code_postal = ? WHERE id = ?");
                $insertcodepostal->execute(array($codepostal, $_SESSION['id']));
                $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                $_SESSION['code_postal'] = $codepostal;
                $this->_Talert = 1;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($ville) && !empty($ville)) {
            if ($ville != $_SESSION['ville']) {
                $insertville = $this->bdd->prepare("UPDATE utilisateurs SET ville = ? WHERE id = ?");
                $insertville->execute(array($ville, $_SESSION['id']));
                $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                $this->_Talert = 1;
                $_SESSION['ville'] = $ville;
                header('refresh:3;url=index.php?page=profil');
            }
        }
        if (isset($password) && !empty($password) && isset($passwordverify) && !empty($passwordverify)) {
            if (!empty($password) && empty($passwordverify)) {
                echo 3;
                $this->_Malert =  '<p style="color:red;font-size:120%;text-align:center"> <strong>* Tous les champs doivent être complétés</p>';
                $this->_Talert = 2;
            } elseif (!empty($password) && !empty($passwordverify)) {
                if ($password == $passwordverify) {
                    if ($password != $_SESSION['password']) {

                        $newpassword = hash('sha512', $password);
                        $insertpassword = $this->bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
                        $insertpassword->execute(array($newpassword, $_SESSION['id']));
                        $this->_Malert = '<p style="color:green;font-size:120%;text-align:center"> <strong>* Profil modifié avec succès </p>';
                        $this->_Talert = 1;
                        echo 1;
                    }
                } else {
                    $this->_Malert = '<p style="color:red;font-size:120%;text-align:center"> <strong>* les passwords ne correspondent pas</p>';
                    $this->_Talert = 1;
                    echo 2;
                }
            }
        }
    }
    public function AdminUpdate($name, $surname, $mail, $id_droits)
    {

        if (!empty($name) && !empty($surname) && !empty($mail) && !empty($id_droits)) {

            $req = $this->bdd->query("SELECT * FROM `utilisateurs` WHERE mail = ?");
            $req->execute(array($mail));
            $res = $req->fetchAll(PDO::FETCH_ASSOC);

            if (count($res)) {

                $req = $this->bdd->prepare("UPDATE `utilisateurs` SET `id_droits`= ? WHERE mail = ?");
                $req->execute(array($id_droits, $mail));

                $this->_Malert = 'Les droits de l\'utilisateur ont bien été modifiés.';
                $this->_Talert = 1;
            } else {
                $this->_Malert = 'Erreur: Les informations de l\'utilisateur sont invalides ou inexistantes.';
                $this->_Talert = 2;
            }
        }
    }

    public function disconnect()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("Location:../index.php");
    }
    /*
        GET LES INFOS
    */

    public function getAllInfos()
    {
        $check = $this->bdd->prepare("SELECT * FROM`utilisateurs`,`commentaires`");
        $check->execute();
        $res = $check->fetchAll(PDO::FETCH_ASSOC);

        foreach ($res as $data) { ?>

            <tr>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['nom']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['prenom']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['mail']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['id_droits']; ?></td>
                <td value=" <?php echo $data['id']; ?>"> <?php echo $data['commentaire']; ?></td>
            </tr>
<?php
        }
    }

    public function getId()
    {
        $id = $this->_id;

        return $id;
    }

    public function getNom()
    {
        $mail = $this->_nom;

        return $mail;
    }

    public function getPrenom()
    {
        $password = $this->_prenom;

        return $password;
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
        $mail = $this->_adresse;

        return $mail;
    }

    public function getCodepostal()
    {
        $mail = $this->_codepostal;

        return $mail;
    }

    public function getVille()
    {
        $password = $this->_ville;

        return $password;
    }

    public function getDroits()
    {
        $droits = $this->_droits;

        return $droits;
    }
    public function GetOrderHistoryById()
    {
        $id = $_SESSION['id'];
        $req = $this->bdd->prepare("SELECT * FROM `commandes` WHERE id_utilisateurs=?");
        $req->execute(array($id));
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function password()
    {

        $id = $_SESSION['id'];
        $req = $this->bdd->prepare("SELECT password FROM `utilisateurs` WHERE id=?");
        $req->execute(array($id));
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}