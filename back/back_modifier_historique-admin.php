<?php
// require_once './class/Config.php';
// require_once './class/Commande.php';
$commande = new Commande();
$orders = $commande->GetAllOrderHistorybyId();
// var_dump($orders);
// var_dump($modifuser);
foreach ($orders as $p) {
    $_SESSION['id'] = $p['id'];
    $_SESSION['num_commande'] = $p['num_commande'];
    $_SESSION['montant'] = $p['montant'];
    $_SESSION['etat'] = $p['etat'];
    $_SESSION['adresse_livraison'] = $p['adresse_livraison'];
    $_SESSION['adresse_facturation'] = $p['adresse_facturation'];
};

if (isset($_POST['submit'])) {
    
    $newetat = htmlspecialchars($_POST['newetat']);
    if (!empty($newetat)) {
        if ($newetat === "Choisir une option") {
            echo "veuillez choisir une option";
        } else {
            $commande->UpdateOrderHistory($newetat, $_SESSION['id']);
            // var_dump($_SESSION['id']);
            // var_dump($_SESSION['etat']);
            $_SESSION['etat'] = $newetat;
            echo 'Etat de commande modifier.';
            $id =  $_SESSION['id'];
            header('location:index.php?page=historique-admin');
        }
    }
}
