<?php 

if(isset($_GET['id']) && isset($_GET['action'])) {
    if($_GET['action'] === "delete") {
        UtilisateurDAO::delete(htmlspecialchars($_GET['id']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    }
}


    $menuFermerConnexion = new Menu('fermerConnexion');
    $menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
    $menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');
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