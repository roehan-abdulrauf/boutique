<?php
require_once './class/Connecte.php';
$connectes = new Connecte();
// $viewconnecte = $connectes->getAllConnect();

// Code pour compter le nombre de user connecté

// ÉTAPE 1 : on vérifie si l'IP se trouve déjà dans la table.
// le nombre d'entrées dont le champ "ip" est l'adresse IP du visiteur.
$donnees['id'] = $connectes->getConnectCount();

if ($donnees['id'] == 0) // L'IP ne se trouve pas dans la table, on va l'ajouter.
{
  $connectes->InsertConnect();
} else // L'IP se trouve déjà dans la table, on met juste à jour le timestamp.
{
  $connectes->UpdateConnect();
}

// -------
// ÉTAPE 2 : on supprime toutes les entrées dont le timestamp est plus vieux que 5 minutes.

// On stocke dans une variable le timestamp qu'il était il y a 5 minutes :
$connectes->DeleteConnect();
// -------
// ÉTAPE 3 : on compte le nombre d'IP stockées dans la table. C'est le nombre de visiteurs connectés.
$donnees['id2'] = $connectes->getConnect();


// Ouf ! On n'a plus qu'à afficher le nombre de connectés !
if ($donnees['id2'] > 1) {
  echo '<p>Il y a actuellement ' . $donnees[0]['id2'] . ' visiteurs connectés sur le site !</p>';
} else {
  echo '<p>Il y a actuellement ' . $donnees['id2'] . ' visiteur connecté sur le site !</p>';
}
