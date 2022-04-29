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
    echo 1;
    $etat = htmlspecialchars($_POST['etat']);
    if (!empty($etat)) {
        echo 2;
        $commande->UpdateOrderHistory($etat, $_SESSION['id']);
            var_dump($_SESSION['id']);
            var_dump($_SESSION['etat']);
            echo 'Etat de commande modifier.';
            // header("Refresh:2;url=modifier_historique-admin.php");
            // header("Refresh:2;url=index.php?page=produit-admin");
        }
    }
