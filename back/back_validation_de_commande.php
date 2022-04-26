<?php
// session_start();

// require_once('class/Config.php');
// require('class/Adresse.php');
$adres = new Adresse();

if (isset($_POST['btncommande'])) {
    if (!empty($_POST['checkbox1']) || !empty($_POST['checkbox2'])) {
        $nom_prenom = htmlspecialchars($_POST['nom_prenom']);
        $numero = htmlspecialchars($_POST['numero']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $complement_adresse = htmlspecialchars($_POST['complement_adresse']);
        $code_postale = htmlspecialchars($_POST['code_postal']);
        $ville = htmlspecialchars($_POST['ville']);

        if (!empty($nom_prenom) && !empty($numero) && !empty($adresse) && !empty($code_postale) && !empty($ville)) {
            echo 1;
            $nom_prenom = strtoupper($nom_prenom);
            $adresse = strtoupper($adresse);
            $complement_adresse = strtoupper($complement_adresse);
            $ville = strtoupper($ville);

            if (!empty($complement_adresse)) {
                echo 2;
                $req = $adres->AdresseFacturationComplement($nom_prenom, $numero, $adresse, $complement_adresse, $code_postale, $ville);
                var_dump($req);
            } else {
                echo 3;
                $req = $adres->AdresseFacturation($nom_prenom, $numero, $adresse, $code_postale, $ville);
                var_dump($req);
            }
        } else {
            $_SESSION['erreur'] = 'Vous devez remplir correctement tous les champs.';
        }

        $nom_prenom_livr = htmlspecialchars($_POST['nom_prenom_livr']);
        $numero_livr = htmlspecialchars($_POST['numero_livr']);
        $adresse_livr = htmlspecialchars($_POST['adresse_livr']);
        $complement_adresse_livr = htmlspecialchars($_POST['complement_adresse_livr']);
        $code_postale_livr = htmlspecialchars($_POST['code_postal_livr']);
        $ville_livr = htmlspecialchars($_POST['ville_livr']);

        if (!empty($nom_prenom_livr) && !empty($numero_livr) && !empty($adresse_livr) && !empty($code_postale_livr) && !empty($ville_livr)) {
            echo 1;
            $nom_prenom_livr = strtoupper($nom_prenom_livr);
            $adresse_livr = strtoupper($adresse_livr);
            $complement_adresse_livr = strtoupper($complement_adresse_livr);
            $ville_livr = strtoupper($ville_livr);

            if (!empty($complement_adresse_livr)) {
                echo 2;
                $req = $adres->AdresseLivraisonComplement($nom_prenom_livr, $numero_livr, $adresse_livr, $complement_adresse_livr, $code_postale_livr, $ville_livr);
                var_dump($req);
            } else {
                echo 3;
                $req = $adres->AdresseLivraison($nom_prenom_livr, $numero_livr, $adresse_livr, $code_postale_livr, $ville_livr);
                var_dump($req);
            }
        } else {
            $_SESSION['erreur'] = 'Vous devez remplir correctement tous les champs.';
        }

        if ($_POST['checkbox1']) {
            header('location:index.php?page=carte_bancaire');
        } elseif ($_POST['checkbox2']) {
            header('location:index.php?page=paypal');
        }
    } else {
        echo 'Veuillez cocher un moyen de paiement svp';
    }
}
