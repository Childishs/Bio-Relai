<?php

if($_SESSION['user']['statut'] === "producteur") {

    if (isset($_GET['Producteur'])) {
        require_once(dispatcher::dispatch('Producteur'));
        die();
    }

    $menuProducteur = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Home","Producteur"));


    // $menuResponsable = $menuResponsable->creerMenu('0','demandeConnexion');
    $menuProducteur->creerMenu('0','Producteur');


    // Menu - Accès interne

    $formulaireRouting = new Menu("InsideResp");

    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $formulaireRouting->ajouterComposant($formulaireRouting->creerItemLien("Producteurs","ResponsableProducteurs"));
    $formulaireRouting->ajouterComposant($formulaireRouting->creerItemLien("Compte","ResponsableCompte"));

    // $menuResponsable = $menuResponsable->creerMenu('0','demandeConnexion');
    $formulaireRouting->creerMenu('0','Responsable');




    // mise en place du form
    $formulaireResponsable = new Formulaire('post','index.php','RespUpdate','RespUpdate');

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Modifier mes informations"));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Prénom"));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('prenom', 'prenom', htmlspecialchars($_SESSION['user']['prenom']), 0,'', ''));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Nom :'));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('nom','nom',htmlspecialchars($_SESSION['user']['nom']),0,"",''));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("E-mail"));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('email', 'email', htmlspecialchars($_SESSION['user']['email']), 0,'', ''));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Ancien mot de Passe :'));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputMdp('mdp','mdp',0,"**********",''));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Nouveau mot de passe :'));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputMdp('mdp2','mdp2',0,"Votre nouveau mot de passe",''));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('sauvegardeResp','sauvegardeResp',"Sauvegarder vos informations"));
    $formulaireResponsable->ajouterComposantTab();


    $formulaireResponsable->creerFormulaire();




    require_once('vues/producteurs/vueProducteursVentes.php');
}
