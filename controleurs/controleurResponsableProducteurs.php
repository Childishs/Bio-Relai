<?php 

$menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Catégories", "ResponsableCategories"));

    // $menuResponsable = $menuResponsable->creerMenu('1','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');


// récupérer tous les producteurs 

$producteurs = UtilisateurDAO::getAllByStatut('producteurs');

// TODO : 
// formulaire suppression
// formulaire update


// Formulaire d'inscription producteur 
$formulaireResponsable = new Formulaire('post','index.php','ajoutProd','ajoutProd');
    
$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Créer un producteur"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Prénom"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('prenom', 'prenom', '', 1,'Prénom du producteur', ''));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Nom :'));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('nom','nom','',1,"Nom du producteur",''));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("E-mail"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('email', 'email', '', 1,'Email du producteur', ''));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Mot de Passe :'));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputMdp('mdp','mdp',1,"**********",''));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('ajoutProd','ajoutProd',"Sauvegarder les informations"));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->creerFormulaire();


require_once('vues/responsable/vueResponsableProducteurs.php');