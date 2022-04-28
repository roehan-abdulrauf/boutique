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
            
            $nom_prenom = strtoupper($nom_prenom);
            $adresse = strtoupper($adresse);
            $complement_adresse = strtoupper($complement_adresse);
            $ville = strtoupper($ville);

            if (!empty($complement_adresse)) {
                
                $adresse_facturation = $nom_prenom.' '.$adresse.' '.$complement_adresse.' '.$ville.' '.$code_postale;
                // $req = $adres->AdresseFacturationComplement($nom_prenom, $numero, $adresse, $complement_adresse, $code_postale, $ville);
                // var_dump($req);
                var_dump($adresse_facturation);
                $_SESSION['adresseFacturation'] = $adresse_facturation;
            } else {
                
                $adresse_facturation = $nom_prenom.' '.$adresse.' '.$ville.' '.$code_postale;
                // $req = $adres->AdresseFacturation($nom_prenom, $numero, $adresse, $code_postale, $ville);
                // var_dump($req);
                var_dump($adresse_facturation);
                $_SESSION['adresseFacturation'] = $adresse_facturation;
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
            
            $nom_prenom_livr = strtoupper($nom_prenom_livr);
            $adresse_livr = strtoupper($adresse_livr);
            $complement_adresse_livr = strtoupper($complement_adresse_livr);
            $ville_livr = strtoupper($ville_livr);

            if (!empty($complement_adresse_livr)) {
                
                $adresse_livraison = $nom_prenom_livr.' '.$adresse_livr.' '.$complement_adresse_livr.' '.$ville_livr.' '.$code_postale_livr;
                // $req = $adres->AdresseLivraisonComplement($nom_prenom_livr, $numero_livr, $adresse_livr, $complement_adresse_livr, $code_postale_livr, $ville_livr);
                // var_dump($req);
                var_dump($adresse_livraison);
                $_SESSION['adresseLivraison'] = $adresse_livraison;
            } else { 
                
                $adresse_livraison = $nom_prenom_livr.' '.$adresse_livr.' '.$ville_livr.' '.$code_postale_livr;
                // $req = $adres->AdresseLivraison($nom_prenom_livr, $numero_livr, $adresse_livr, $code_postale_livr, $ville_livr);
                // var_dump($req);
                var_dump($adresse_livraison);
                $_SESSION['adresseLivraison'] = $adresse_livraison;
            }
        } else {

            $_SESSION['erreur'] = 'Vous devez remplir correctement tous les champs.';
        }

        if ($_POST['checkbox1']) {

            header('location:index.php?page=carte_bancaire');
        } elseif ($_POST['checkbox2']) {

            
            $num_commande = rand(0,100000000);
            $date = date("Y-m-d H:i:s");
            $etat = 'En cours';
            $payment = new Commande;
            // $payment->payment($_SESSION['panier'],$num_commande);
            
            foreach($_SESSION['panier'] as $id_produit_panier => $quantite_produit_panier){
                
                // echo $id_produit_panier;
                // $_SESSION['id_produit_panier'] = $id_produit_panier;
                // $_SESSION['quantite_produit_panier'] = $quantite_produit_panier;
                // var_dump($id_produit_panier);
                // var_dump($quantite_produit_panier);
                // var_dump($id_produit_panier);
                // var_dump($num_commande);
                
                $payment->payment($id_produit_panier,$num_commande,$quantite_produit_panier);
                
                
            }
            
            $payment->insertCommand($num_commande,$date,$_SESSION['total'],$etat,$adresse_livraison,$adresse_facturation,$_SESSION['id']);
            header('location:index.php?page=placeorder');
        }
    } else {

        echo 'Veuillez cocher un moyen de paiement svp';
    }
}

// var_dump($_SESSION['panier']);

// foreach($_SESSION['panier'] as $id_produit_panier => $quantite_produit_panier){


//     // var_dump($id_produit_panier);
//     // var_dump($quantite_produit_panier);
//     // echo 55;

// }