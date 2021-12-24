<?php

//bouton modifier dans la page mon compte
if (isset($_POST['submitModifCompte']))
{
    $idUtilisateur = $_SESSION['user']['idUtilisateur'];
    $mailProducteur = $_POST['newMailAdh'];
    $mdpProducteur = $_POST['newMdpAdh'];
    $nomProducteur = $_POST['newNomAdh'];
    $prenomProducteur = $_POST['newPrenomAdh'];


   $_SESSION['modifUser'] = AdherentDAO::updateUtilisateur($idUtilisateur, $mailProducteur, $mdpProducteur, $nomProducteur, $prenomProducteur);

   if($_SESSION['modifUser']){ // revient a mettre if($_SESSION['infoUser']) == true
    echo "changement données du USER ok </br>";
  }
  else{
    echo "changement données du USER non ok </br>";

  }

  $_SESSION['modifAdherent'] =  AdherentDAO::updateAdherent($idUtilisateur, $mailProducteur, $mdpProducteur, $nomProducteur, $prenomProducteur);

  if($_SESSION['modifAdherent']){ // revient a mettre if$_SESSION['modifProducteur'] == true
    echo "changement données de l'ADHERENT ok";
  }
  else{
    echo "changement données de l'ADHERENT non ok";

  }
}

//bouton supprimer dans la page mon compte
if (isset($_POST['submitSupCompte']))
{
    $idUtilisateur = $_SESSION['user']['idUtilisateur'];


   $_SESSION['supUser'] = AdherentDAO::deleteUtilisateur($idUtilisateur);

   if($_SESSION['supUser']){
    echo "suppression compte du USER ok </br>";
  }
  else{
    echo "suppression compte du USER non ok </br>";

  }

  $_SESSION['supAdherent'] =  AdherentDAO::deleteAdherent($idUtilisateur);

  if($_SESSION['supAdherent']){
    echo "suppression compte de l'ADHERENT ok";
  }
  else{
    echo "suppression compte de l'ADHERENT non ok";

  }
  include_once Dispatcher::dispatch('visiteurs');
}


//***************************  CREATION BOUTON POUR LA CONNEXION ********************************************
if (isset($_GET['menuAdherents'])){
  $_SESSION['menuAdherents']=$_GET['menuAdherents'];
  //var_dump($_GET['menuAdherents']);
}
else{
  $_SESSION['menuAdherents']="AdherentsMonCompte";
}

//***************************  CREATION MENU ADHERENTS********************************************
$menuAdherents = new Menu('menuBioRelai');
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien('Mon Compte','AdherentsMonCompte'));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien('Achat','AdherentsAchats'));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien('Facture','AdherentsFactures'));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien('Panier','AdherentsPanier'));
$menuAdherents->ajouterComposant($menuAdherents->creerItemLien('Deconnexion','fermer'));
$menuAdherents->creerMenu('0','menuAdherents');

//$menuAdherents->creerMenu($_SESSION['menuAdherents'],'menuAdherents');
//var_dump($_SESSION['user']);
//var_dump($_SESSION['menuAdherents']);

include_once Dispatcher::dispatch($_SESSION['menuAdherents']);
//include_once dispatcher::dispatch('AdherentsMonCompte');

//include_once 'vues/adherents/vueAdherentsMonCompte.php';
require_once 'controleurPrincipal.php';


//require_once 'vues/adherents/vueAdherentsMonCompte.php';
