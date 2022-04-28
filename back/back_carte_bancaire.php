<?php
// require_once('class/Config.php');
// require('class/Carte.php');
$carte = new Carte();

if (isset($_POST['btncommande'])) {

    $numero_carte = htmlspecialchars($_POST['numero_carte']);
    $nom_carte = htmlspecialchars($_POST['nom_carte']);
    $mois_carte = htmlspecialchars($_POST['mois_carte']);
    $annee_carte = htmlspecialchars($_POST['annee_carte']);
    $cvv = htmlspecialchars($_POST['cvv']);
    $enregistrer_carte = htmlspecialchars($_POST['enregistrer_carte']);

    if (!empty($numero_carte) && !empty($nom_carte) && !empty($mois_carte) && !empty($annee_carte) && !empty($cvv)) {
        echo 1;
        if ($enregistrer_carte) {
            // echo 2;
            $enregistrer_carte = "oui";

            $numero_carte = crypt($numero_carte, 'carte_bancaire');

            $nom_carte = strtoupper($nom_carte);

            $req = $carte->RegisterCarte($numero_carte, $nom_carte,$enregistrer_carte);
            // var_dump($req);
            $num_commande = rand(0,100000000);
            $date = date("Y-m-d H:i:s");
            $etat = 'En cours';
            $payment = new Commande;
            // $payment->payment($_SESSION['panier'],$num_commande);
            
            foreach($_SESSION['panier'] as $id_produit_panier => $quantite_produit_panier){
                
                // echo $id_produit_panier;
                // $_SESSION['id_produit_panier'] = $id_produit_panier;
                // $_SESSION['quantite_produit_panier'] = $quantite_produit_panier;
                var_dump($id_produit_panier);
                var_dump($quantite_produit_panier);
                var_dump($id_produit_panier);
                var_dump($num_commande);
                
                $payment->payment($id_produit_panier,$num_commande,$quantite_produit_panier);
                
                
            }
            
            $payment->insertCommand($num_commande,$date,$_SESSION['total'],$etat,$_SESSION['adresseLivraison'],$_SESSION['adresseFacturation'],$_SESSION['id']);
            header('location:index.php?page=placeorder');
            
        }else{

            $num_commande = rand(0,100000000);
            $date = date("Y-m-d H:i:s");
            $etat = 'En cours';
            $payment = new Commande;
            // $payment->payment($_SESSION['panier'],$num_commande);
            
            foreach($_SESSION['panier'] as $id_produit_panier => $quantite_produit_panier){
                
                // echo $id_produit_panier;
                // $_SESSION['id_produit_panier'] = $id_produit_panier;
                // $_SESSION['quantite_produit_panier'] = $quantite_produit_panier;
                var_dump($id_produit_panier);
                var_dump($quantite_produit_panier);
                var_dump($id_produit_panier);
                var_dump($num_commande);
                
                $payment->payment($id_produit_panier,$num_commande,$quantite_produit_panier);
                
                
            }
            
            $payment->insertCommand($num_commande,$date,$_SESSION['total'],$etat,$_SESSION['adresseLivraison'],$_SESSION['adresseFacturation'],$_SESSION['id']);
            header('location:index.php?page=placeorder');
        }
    } else {
        $_SESSION['erreur'] = 'Vous devez remplir correctement tous les champs.';
    }
}