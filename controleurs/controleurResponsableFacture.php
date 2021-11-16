<?php 


    $menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Catégories", "ResponsableCategories"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Factures", "ResponsableFacture"));

    // $menuResponsable = $menuResponsable->creerMenu('1','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');


require_once('vues/responsable/vueResponsableFacture.php');