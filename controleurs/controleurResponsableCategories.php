<?php 

    $menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Catégories", "ResponsableCategories"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Factures", "ResponsableFacture"));

    // $menuResponsable = $menuResponsable->creerMenu('1','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');


    $menuFermerConnexion = new Menu('fermerConnexion');
    $menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
    $menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');


// MIse en place des cat 

$categories = CategorieDAO::getAll();


// Formulaire d'inscription producteur 
$formulaireResponsable = new Formulaire('post','index.php','ajoutCat','ajoutCat');
    
$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Créer un producteur"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Catégorie : "));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('categorie', 'categorie', '', 1,'Nom de la catégorie', ''));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('ajoutCat','ajoutCat',"Créer la catégorie"));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->creerFormulaire();

require_once('vues/responsable/vueResponsableCategories.php');