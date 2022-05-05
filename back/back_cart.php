<?php

if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {


    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    $objet = new Panier;
    $product = $objet->getProduit($product_id);
    

    // Si le produit existe et que le user a selectionné plus de zero pour la quantité
    if ($product && $quantity > 0) {

            // Si le panier existe déja et si $_SESSION['panier'] est un tableau
            if (isset($_SESSION['panier']) && is_array($_SESSION['panier'])) {

                // si dans le tableau $_SESSION['panier'] la clé $product_id existe
                if (array_key_exists($product_id, $_SESSION['panier'])) {

                    //Le Produit existe dans le panier, juste mettre à jour la quantité
                    $_SESSION['panier'][$product_id] += $quantity;

                } else {

                    // Produit inexistant dans le panier donc juste l'ajouter 
                    $_SESSION['panier'][$product_id] = $quantity;
                }

            } else {

                // Panier inexistant/vide, ajoute le premier produit
                $_SESSION['panier'] = [$product_id => $quantity];
        }
    }

    // Envoie au panier aprés un ajout dans celui-ci
    header('location: index.php?page=cart');
    exit;

}

if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['panier']) && isset($_SESSION['panier'][$_GET['remove']])) {
    $remove = new Panier;
    $remove->deleteProduct();
}

// Update quantité produit
if (isset($_POST['update']) && isset($_SESSION['panier'])) {

    // on boucle sur les données pour update les quantités pour chaque produit dans le panier
    foreach ($_POST as $i => $j) {

        if (strpos($i, 'quantity') !== false && is_numeric($j)) {
            $id = str_replace('quantity-', '', $i);
            $quantity = (int)$j;

            // checks et validation
            if (is_numeric($id) && isset($_SESSION['panier'][$id]) && $quantity > 0) {

                // Update quantité
                $_SESSION['panier'][$id] = $quantity;
            }
        }
    }

    
}

 // Lien vers la page confirmation de paiement quand le user clique sur 'payer'/ le panier de doit pas être vide
 if (isset($_POST['placeorder']) && isset($_SESSION['panier']) && !empty($_SESSION['panier'])) {
    

    if(!isset($_SESSION['id'])){

        $_SESSION['message']= '<p style="color:red;font-size:120%;text-align:center"> <strong>*Vous devez vous connecter pour valider votre panier</p>';
        header('refresh:2 url=index.php?page=connexion');
        

    } else{

        header('Location: index.php?page=validation_de_commande');
        
    }
    
}


$products_in_cart = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
$products = [];
$subtotal = 0;

if ($products_in_cart) {

    $objet = new Panier;
    $products = $objet->produitsPanier($products_in_cart);

    // Calcul du total
    foreach ($products as $product) {
        $subtotal += (float)$product['prix'] * (int)$products_in_cart[$product['id']];
    }
}


$_SESSION['total'] = $subtotal;

