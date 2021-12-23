<?php



$menuFermerConnexion = new Menu('fermerConnexion');
$menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
$menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');

$commandes = CommandeDAO::getAllProducteurCommande($_SESSION['user']['id']);

$commandesAvenir = CommandeDAO::getAllProducteurAVenir($_SESSION['user']['id']);

var_dump($commandes);

require_once('vues/producteurs/vueProducteursFactures.php');