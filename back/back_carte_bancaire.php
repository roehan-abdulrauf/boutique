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

    if (!empty($numero_carte) && !empty($nom_carte) && !empty($mois_carte) && !empty($annee_carte) && !empty($cvv)) {
        
        $num_commande = rand(0, 100000000);
        $date = date("Y-m-d H:i:s");
        $etat = 'En cours de prepation';
        $payment = new Commande;
        $stock = new Products;
        // $payment->payment($_SESSION['panier'],$num_commande);

        foreach ($_SESSION['panier'] as $id_produit_panier => $quantite_produit_panier) {

            $p=$payment->payment($id_produit_panier, $num_commande, $quantite_produit_panier);
            $s = $stock->getStock($id_produit_panier);
            // var_dump($p);
            $i = $s[0];

            $stock->updateStock($i, $quantite_produit_panier, $id_produit_panier);
        }

        $u = $payment->insertCommand($num_commande, $date, $_SESSION['total'], $etat, $_SESSION['adresseLivraison'], $_SESSION['adresseFacturation'], $_SESSION['id']);
        header('location:index.php?page=placeorder');
        // }
        // var_dump($u);
    } else {
        $_SESSION['erreur'] = 'Vous devez remplir correctement tous les champs.';
    }
}
