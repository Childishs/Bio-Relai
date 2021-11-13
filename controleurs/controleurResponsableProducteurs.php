<?php 

$menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));

    // $menuResponsable = $menuResponsable->creerMenu('0','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');

    
// récupérer tous les producteurs 

$producteurs = UtilisateurDAO::getAllByStatut('producteurs');

require_once('vues/responsable/vueResponsableProducteurs.php');