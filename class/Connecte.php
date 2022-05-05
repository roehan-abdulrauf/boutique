<?php
require_once 'Config.php';
class Connecte extends  Config
{
    public $_ip;
    public $_derniere;
    public $_pseudo;
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

    public function getAllConnect()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // time actuel
        $time = time();

        // on recherche l’utilisateur
        $check = $this->bdd->prepare("SELECT * FROM connectes where ip= ?");
        $check->execute(array($ip));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function RegisterConnect()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // time actuel
        $time = time();

        $check = $this->bdd->prepare("INSERT INTO connectes VALUES (?,?)");
        $check->execute(array($ip, $time));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateConnect()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // time actuel
        $time = time();

        $check = $this->bdd->prepare("UPDATE connectes SET derniere= :derniere WHERE ip=:ip");
        $check->execute(array(':derniere'=>$time,
        ':ip' => $ip));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteCountConnect()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // time actuel
        $time = time();
        // temps d'incativité
        $time -= $time * 60;

        $check = $this->bdd->prepare("DELETE LOW_PRIORITY FROM connectes WHERE derniere <= ,");
        $check->execute(array($time));
        return $check->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCountConnect()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        // time actuel
        $time = time();
        // temps d'incativité
        $time -= $time * 60;

        $checke = $this->bdd->prepare("SELECT count(*) FROM connectes");
        $checke->execute(array($time));
        return $checke->fetchAll(PDO::FETCH_ASSOC);
    }

}