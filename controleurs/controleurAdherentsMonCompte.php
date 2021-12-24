<?php


$objetProd = AdherentDAO::getAdherent($_SESSION['user']['idUtilisateur']);

$mailAdherent = $objetProd->getMail();
$mdpAdherent = $objetProd->getMdp();
$nomAdherent = $objetProd->getNomUtilisateur();
$prenomAdherent = $objetProd->getPrenomUtilisateur();

//************************* FORMULAIRE CHANGEMENT INFO Adherent ************************* */
$formulaireMonCompte = new Formulaire('post','index.php', 'formulaireConnexion','formulaireConnexion');

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerTitre('je change mes infos'));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabel('mail'));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte('newMailAdh','newMailAdh',$mailAdherent,1,'',''));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabel('mdp'));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte('newMdpAdh','newMdpAdh',$mdpAdherent,1,'',''));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabel('nom'));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte('newNomAdh','newNomAdh',$nomAdherent,1,'',''));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerLabel('prenom'));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputTexte('newPrenomAdh','newPrenomAdh',$prenomAdherent,1,'',''));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->ajouterComposantLigne($formulaireMonCompte->creerInputSubmit('submitModifCompte','submitModifCompte',"Modifier"));
$formulaireMonCompte->ajouterComposantTab();

$formulaireMonCompte->creerFormulaire();

//************************* FORMULAIRE SUPPRESSION COMPTE Adherent ************************* */
$formulaireSupMonCompte = new Formulaire('post','index.php', 'formulaireConnexion','formulaireConnexion');

$formulaireSupMonCompte->ajouterComposantLigne($formulaireSupMonCompte->creerTitre('je supprime mon compte d\'adherent'));
$formulaireSupMonCompte->ajouterComposantTab();

$formulaireSupMonCompte->ajouterComposantLigne($formulaireSupMonCompte->creerInputSubmit('submitSupCompte','submitSupCompte',"Supprimer"));
$formulaireSupMonCompte->ajouterComposantTab();

$formulaireSupMonCompte->creerFormulaire();



include_once 'vues/adherents/vueAdherentsMonCompte.php';
