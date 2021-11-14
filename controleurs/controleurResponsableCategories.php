<?php 

    $menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Catégories", "ResponsableCategories"));

    // $menuResponsable = $menuResponsable->creerMenu('1','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');


// MIse en place des cat 

$categories = CategorieDAO::getAll();

require_once('vues/responsable/vueResponsableCategories.php');