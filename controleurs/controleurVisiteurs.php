<?php

/*
 * Créer bouton connexion
 */

$menuConnexion = new Menu('btnConnexion');
$menuConnexion->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
$leMenuConnexion = $menuConnexion->creerMenu('0','demandeConnexion');

include_once 'vues/visiteurs/vueVisiteur.php';