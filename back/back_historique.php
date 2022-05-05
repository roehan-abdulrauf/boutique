<?php

$commande = new Commande();

$historique = $commande->GetOrderHistoryById();

// var_dump($historique);

$lastoid = 0;
// var_dump($historique);
