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

    public function getConnectCount()
    {
        $retour = $this->bdd->prepare('SELECT COUNT(*) AS id FROM connectes WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
        $retour->execute();
        return $retour->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConnect()
    {
        $retour = $this->bdd->prepare('SELECT COUNT(*) AS id FROM connectes');
        $retour->execute();
        return $retour->fetchAll(PDO::FETCH_ASSOC);
    }

    public function InsertConnect()
    {
        $retour = $this->bdd->prepare('INSERT INTO connectes VALUES(\'' . $_SERVER['REMOTE_ADDR'] . '\', ' . time() . ')');
        $retour->execute();
        return $retour->fetchAll(PDO::FETCH_ASSOC);
    }

    public function UpdateConnect()
    {
        $retour = $this->bdd->prepare('UPDATE connectes SET timestamp=' . time() . ' WHERE ip=\'' . $_SERVER['REMOTE_ADDR'] . '\'');
        $retour->execute();
        return $retour->fetchAll(PDO::FETCH_ASSOC);
    }

    public function DeleteConnect()
    {
        $timestamp_5min = time() - (60 * 5); // 60 * 5 = nombre de secondes écoulées en 5 minutes
        $retour = $this->bdd->prepare('DELETE FROM connectes WHERE timestamp < ' . $timestamp_5min);
        $retour->execute();
        return $retour->fetchAll(PDO::FETCH_ASSOC);
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
