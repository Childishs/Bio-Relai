<?php 



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


if(isset($_GET['id']) && isset($_GET['action'])) {
    if($_GET['action'] === "delete") {
        UtilisateurDAO::delete(htmlspecialchars($_GET['id']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    }
    else if($_GET['action'] === "toUpdate") {

        $producteur = UtilisateurDAO::getOne(htmlspecialchars($_GET['id']));

        $formulaireResponsable = new Formulaire('post','index.php','modifProd','modifProd');
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Modifier un producteur"));
        $formulaireResponsable->ajouterComposantTab();

        $_SESSION['tokenAdMod'] = $producteur->getToken();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('id', 'id', $producteur->getToken(), 1,'', 'readonly'));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Prénom"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('prenom', 'prenom', $producteur->getPrenomUtilisateur() , 1,'', ''));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Nom :'));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('nom','nom',$producteur->getNomUtilisateur(),1,"",''));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("E-mail"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('email', 'email', $producteur->getMail(), 1, '', ''));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('modifProd','modifProd',"Sauvegarder les informations"));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->creerFormulaire();
    }
}



require_once('vues/responsable/vueResponsableProducteurs.php');