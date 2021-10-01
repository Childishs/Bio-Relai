<?php

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

    $formulaireInscription->ajouterComposantLigne($formulaireInscription->creerInputSubmit('submitConnex','submitConnex','Se Connecter'));
    $formulaireInscription->ajouterComposantTab();



    $formulaireInscription->creerFormulaire();

    
    include_once 'vues/visiteurs/vueInscription.php';



?>


