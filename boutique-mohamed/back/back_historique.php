<?php

$user = new User();

$historique = $user->GetOrderHistoryById();

// var_dump($historique);

$lastoid = 0;
//         foreach($historique as $i){
        
//             while($lastoid != $i['id']) {
//                 $lastoid = $i['id'];
//                 echo "Commande n°: ".$lastoid."<br/>";
//                 // echo "Produktname: ".$i['product_name']."<br>";
//                 // echo "Menge: ".$i['quantite']."<br/>";
//                 echo "Prix: ".$i['montant']."<br/>";
//                 echo "Statut de la commande: ".$i['etat']."<br/>";
//                 echo "Date de commande: ".$i['date']."<br/>";
//                 echo "<br/><br/><hr/>";    
//             }
//         }


    ?>