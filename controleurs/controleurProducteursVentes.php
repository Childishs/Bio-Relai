<?php



$menuFermerConnexion = new Menu('fermerConnexion');
$menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
$menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');
// récupérer tous les producteurs

$produits = ProduitDAO::getAll($_SESSION['user']['id']);

$categorie=CategorieDAO::getAll();

$ventes=VentesDAO::getAll();


$infos = ProduitDAO::getAllVente($_SESSION['user']['id']);



//Création d'un formulaire pour l'ajout d'un produit
$formulaireProducteur = new Formulaire('post','index.php','ajoutProdVente','ajoutProdVente');

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerTitre("Ajouter un produit à une vente :"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez un produit :"));
$formulaireProducteur->ajouterComposantTab();


foreach($produits as $produits){
    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerRadio("produit",$produits->getNomProduit(),"produit",$produits->getIdProduit()));
    $formulaireProducteur->ajouterComposantTab();
}


$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez le prix de vente :"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('prix', 'prix', '', 0,'', ''));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez le nombre produits à vendre :"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('nbProd', 'nbProd', '', 0,'', ''));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez une vente :"));
$formulaireProducteur->ajouterComposantTab();

foreach($ventes as $ventes){
    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerRadio("vente",$ventes->getDateVente(),"vente",$ventes->getId()));
    $formulaireProducteur->ajouterComposantTab();
}

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputSubmit('ajoutProdVente','ajoutProdVente',"Ajouter le Produit"));
$formulaireProducteur->ajouterComposantTab();


$formulaireProducteur->creerFormulaire();

if(isset($_GET['id']) && isset($_GET['action'])) {
    if ($_GET['action'] === "delete") {
        ProduitDAO::suppProduitVente($_GET['idVente'],$_GET['id']);
        $_SESSION['message'] = "Élément supprimé avec succès";
    } else if ($_GET['action'] === "toUpdate") {

        $prod = ProduitDAO::getOneVente(htmlspecialchars($_GET['idVente']), htmlspecialchars($_GET['id']));
        $_SESSION['idVente'] = htmlspecialchars($_GET['idVente']);
        $_SESSION['idProduit'] = htmlspecialchars($_GET['id']);

        //Création d'un formulaire pour la modification d'un produit
        $formulaireProducteur = new Formulaire('post', 'index.php', 'modifProduitVente', 'modifProduitVente');

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerTitre("Modifier un produit dans une Vente"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez le produit :"));
        $formulaireProducteur->ajouterComposantTab();


        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez le prix de vente :"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('prix', 'prix', $prod->getPrix(), 0,'', ''));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Choisissez le nombre produits à vendre :"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('quantite', 'quantite', $prod->getQuantite(), 0,'', ''));
        $formulaireProducteur->ajouterComposantTab();


        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputSubmit('modifProduitVente', 'modifProduitVente', "Sauvegarder les informations"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->creerFormulaire();

    }
}

require_once('vues/producteurs/vueProducteursVentes.php');



