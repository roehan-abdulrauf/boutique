<?php
$commande = new View;
$commande->headerStyle();
unset($_SESSION['panier']);
unset($_SESSION['adresse_livraison']);
unset($_SESSION['adresse_facturation']);
?>

<div class="placeorder content-wrapper">
    <h1>Votre commande a été acceptée</h1>
    <p>Merci d'avoir commandé chez nous, nous vous contacterons par e-mail avec les détails de votre commande.</p>
</div>