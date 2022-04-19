<?php

class Config
{
    protected $bdd;
    public function __construct()
    {

        try {
            $this->bdd =  new PDO(
                'mysql:host=localhost;dbname=boutique',
                'root',
                '',
                // pour interagir avec la bdd en UTF8 :
                // array (
                //     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                //     PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                // )
            );
        } catch (Exception $e) {
            // En cas d'erreur, on affiche un message et on arrête tout
            die('Erreur : ' . $e->getMessage());
        }

        return  $this->bdd;
    }
}
?>