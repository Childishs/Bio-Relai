<?php

/*
 * Création du formulaire de connexion
 */

$formulaireConnexion = new Formulaire('post','index.php','fConnexion','fConnexion');

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerTitre("Je me connecte"));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel("E-mail"));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputTexte('login', 'login', '', 1,'Entrez votre identifiant', ''));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerLabel('Mot de Passe :'));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputMdp('mdp','mdp',1,"Entrez votre mot de passe",''));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerInputSubmit('submitConnex','submitConnex','Se Connecter'));
$formulaireConnexion->ajouterComposantTab();

$formulaireConnexion->creerFormulaire();

/*
 * $formulaireConnexion->ajouterComposantLigne($formulaireConnexion->creerMessage($messageErreurConnexion));
$formulaireConnexion->ajouterComposantTab();
 */



$menuInscription = new Menu('demandeInscription');
$menuInscription->ajouterComposant($menuInscription->creerItemLien('Créer un Compte','demandeInscription'));
$menuInscription->creerMenu('0','demandeInscription');

$menuFermerConnexion = new Menu('fermerConnexion');
$menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
$menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');

include_once 'vues/visiteurs/vueConnexion.php';