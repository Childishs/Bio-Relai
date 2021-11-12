<?php 

if($_SESSION['user']['statut'] === "responsable") {
    $menuResponsable = new Menu('Responsable');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Compte","Compte"));



    // $menuResponsable = $menuResponsable->creerMenu('0','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');

    require_once('vues/responsable/vueResponsable.php');
}


