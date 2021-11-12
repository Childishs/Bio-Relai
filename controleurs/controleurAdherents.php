<?php

$menuAdherents = new Menu('Adherents');
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien('Mon Compte','Adherents'));
$menuAdherents->creerMenu('0','Adherents');






include_once 'vues/adherents/vueAdherentsMonCompte.php';
require_once 'controleurPrincipal.php';

$_SESSION['user'];



require_once 'vues/adherents/vueAdherentsMonCompte.php' ;
