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

$formulaireNewVente->ajouterComposantLigne($formulaireNewVente->creerInputSubmit('ajoutProduitVente', 'ajoutProduitVente', "Ajouter un produit à la vente"));
$formulaireNewVente->ajouterComposantTab();

$formulaireNewVente->creerFormulaire();

if(isset($_GET['id']) && isset($_GET['action'])) {
    if ($_GET['action'] === "delete") {
        ProduitDAO::deleteVente(htmlspecialchars($_GET['produit']['vente']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    } else if ($_GET['action'] === "toUpdate") {
        $formulaireModifVente = new Formulaire("post", "", "", "");
        $formulaireModifVente = new Formulaire('post','index.php','VenteCreer','VenteCreer');

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerTitre("Proposer un produit à la vente"));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerLabel("Choisir une vente :"));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerInputTexte('idVente', 'idVente', htmlspecialchars($_SESSION['vente']['idVente']), 0,'', ''));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerLabel('Choix du produit:'));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerInputTexte('idProduit','idProduit',htmlspecialchars($_SESSION['vente']['idProduit']),0,"",''));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerLabel("Unité proposée à la vente"));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerInputTexte('unite', 'unite', htmlspecialchars($_SESSION['vente']['unite']), 0,'', ''));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerLabel('Prix à l\'unité'));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerInputTexte('prix','prix',htmlspecialchars($_SESSION['vente']['unite']),0,"",''));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->ajouterComposantLigne($formulaireModifVente->creerInputSubmit('ajoutProduitVente', 'ajoutProduitVente', "Ajouter un produit à la vente"));
        $formulaireModifVente->ajouterComposantTab();

        $formulaireModifVente->creerFormulaire();


    }
}






require_once ('vues/producteurs/vueProducteursUneVente.php');
