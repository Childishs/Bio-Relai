<?php




//Création d'un formulaire pour l'ajout d'un produit à la vente
$formulaireNewVente = new Formulaire('post','index.php','VenteCreer','VenteCreer');

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerTitre("Proposer un produit à la vente"));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerLabel("Choisir une vente :"));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerInputTexte('idVente', 'idVente', htmlspecialchars($_SESSION['vente']['idVente']), 0,'', ''));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerLabel('Choix du produit:'));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerInputTexte('idProduit','idProduit',htmlspecialchars($_SESSION['vente']['idProduit']),0,"",''));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerLabel("Unité proposée à la vente"));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerInputTexte('unite', 'unite', htmlspecialchars($_SESSION['vente']['unite']), 0,'', ''));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerLabel('Prix à l\'unité'));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerInputTexte('prix','prix',htmlspecialchars($_SESSION['vente']['unite']),0,"",''));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->creerFormulaire();

if(isset($_GET['id']) && isset($_GET['action'])) {
    if ($_GET['action'] === "delete") {
        ProduitDAO::deleteVente(htmlspecialchars($_GET['produit']['vente']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    } else if ($_GET['action'] === "toUpdate") {
        $formulaireModifVente = new Formulaire("post", "", "", "");
    }
}






require_once ('vues/producteurs/vueProducteursUneVente.php');
