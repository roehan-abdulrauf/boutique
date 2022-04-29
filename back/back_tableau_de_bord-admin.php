<?php
require_once './class/Connecte.php';
$connectes = new Connecte();
$viewconnecte = $connectes->getAllConnect();
// var_dump($modifuser);
foreach ($viewconnecte as $c) {
    $_SESSION['ip'] = $c['ip'];
    $_SESSION['derniere'] = $c['derniere'];
    $_SESSION['pseudo'] = $c['pseudo'];
};

if ((count($viewconnecte)) == 0) {
    echo 1;
   $ra = $connectes->RegisterConnect();
  //  var_dump($ra);
}
// mise-à-jour
else {
    echo 2;
  $re =  $connectes->UpdateConnect();
  // var_dump($re);
}
// // temps d'incativité
// $time -= $temps * 60;

// on supprime ceux qui n'ont pas été connectés depuis assez longtemps
$ree = $connectes->DeleteCountConnect();
// var_dump($ree);
/*******************
  Affichage des connectés
 *******************/

$checke = $connectes->getCountConnect();
// var_dump($checke);

// if ($checke) {
//     $visiteurs = mysqli_fetch_array($result);
//     echo '<li><br />Connect&eacute;s: ' . $visiteurs[0] . '</li>';
// }
