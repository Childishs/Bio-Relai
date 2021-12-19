<?php



$menuFermerConnexion = new Menu('fermerConnexion');
$menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
$menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');
// récupérer tous les producteurs

$commandes = CommandeDAO::getAllProducteur($_SESSION['user']['id']);




require_once('vues/producteurs/vueProducteursFactures.php');