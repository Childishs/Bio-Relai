<?php

$menuConnexion = new Menu('btnConnexion');
$menuConnexion->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
$leMenuConnexion = $menuConnexion->creerMenu('0','demandeConnexion');

    $formulaireInscription = new Formulaire('post','index.php','fConnexion','fConnexion');

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerTitre("Je crée mon compte"));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel("Prénom"));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('prenom', 'prenom', '', 1,'Entrez votre prénom', ''));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Nom :'));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('nom','nom',"",1,"Entrez votre nom",''));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel("E-mail"));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputTexte('email', 'email', '', 1,'Entrez votre e-mail', ''));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerLabel('Mot de Passe :'));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputMdp('mdp','mdp',1,"Entrez votre mot de passe",''));
    $formulaireInscription->ajouterComposantTab();

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit('submitInscription','submitInscription',"S inscrire"));
    $formulaireInscription->ajouterComposantTab();

   
    $formulaireInscription->creerFormulaire();



    $formulaireInscriptionRetour = new Formulaire('post','index.php','fConnexionRetour','fConnexionRetour');
    $formulaireInscriptionRetour->ajouterComposantLigne($formulaireInscriptionRetour->creerInputBoutonRetour("Retour"));
    $formulaireInscriptionRetour->ajouterComposantTab();
    $formulaireInscriptionRetour->creerFormulaire();




    include_once 'vues/visiteurs/vueInscription.php';



?>


