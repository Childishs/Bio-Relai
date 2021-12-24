<?php 


    $menuFermerConnexion = new Menu('fermerConnexion');
    $menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
    $menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');
// récupérer tous les producteurs 

$producteurs = ProducteurDAO::getAllProducteurs();


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


$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Adresse"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('adresse', 'adresse', '', 1,'Adresse du producteur', ''));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Commune"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('commune', 'commune', '', 1,'Commune du producteur', ''));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Code Postal"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('codePostal', 'codePostal', '', 1,'Code postal du producteur', ''));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Descriptif"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('descriptif', 'descriptif', '', 1,'Descriptif du producteur', ''));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Photo producteur"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputPhoto('photo', 'photo'));
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

        $producteur = ProducteurDAO::getOneProducteurs(htmlspecialchars($_GET['id']));

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


        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Adresse"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('adresse', 'adresse', $producteur->getAdresseProducteur(), 1,'Adresse du producteur', ''));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Commune"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('commune', 'commune', $producteur->getCommuneProducteur(), 1,'Commune du producteur', ''));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Code Postal"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('codePostal', 'codePostal', $producteur->getCodePostalProducteur(), 1,'Code postal du producteur', ''));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Descriptif"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('descriptif', 'descriptif', $producteur->getDescriptifProducteur(), 1,'Descriptif du producteur', ''));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Photo producteur"));
        $formulaireResponsable->ajouterComposantTab();

        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputPhoto('photo', 'photo'));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('modifProd','modifProd',"Sauvegarder les informations"));
        $formulaireResponsable->ajouterComposantTab();


        $formulaireResponsable->creerFormulaire();
    }
}



require_once('vues/responsable/vueResponsableProducteurs.php');