<?php



$menuFermerConnexion = new Menu('fermerConnexion');
$menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
$menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');
// récupérer tous les producteurs

$produits = ProduitDAO::getAll($_SESSION['user']['id']);

$categorie=CategorieDAO::getAll();

var_dump($categorie);

//Création d'un formulaire pour l'ajout d'un produit
$formulaireNewProduit = new Formulaire('post','index.php','ProduitCreer','ProduitCreer');

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerTitre("Creer produit"));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerLabel("Nom du produit"));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerInputTexte('nomProd', 'nomProd',"", 0,'', 'Nom du Produit'));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerLabel('Description :'));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerInputTexte('description','description',"",0,"","Description"));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerLabel("Photo"));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerInputTexte('photo', 'photo', "", 0,'', 'Photo'));
$formulaireNewProduit->ajouterComposantTab();

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerLabel('Catégorie'));

$formulaireNewProduit->ajouterComposantTab();
foreach($categorie as $categorie){
    $formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerRadio(""));
    $formulaireNewProduit->ajouterComposantTab();
}

$formulaireNewProduit->ajouterComposantLigne($formulaireNewProduit->creerInputSubmit('ajoutProduit','ajoutProduit',"Sauvegarder les informations"));
$formulaireNewProduit->ajouterComposantTab();


$formulaireNewProduit->creerFormulaire();

if(isset($_GET['idProduit']) && isset($_GET['action'])) {
    if ($_GET['action'] === "delete") {
        ProduitDAO::supprimerProduit(htmlspecialchars($_GET['idProduit']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    } else if ($_GET['action'] === "toUpdate") {



        $produit = new ProduitDTO();

        //Création d'un formulaire pour la modification d'un produit
        $formulaireModifProduit = new Formulaire('post', 'index.php', 'ProduitModif', 'ProduitModif');

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerTitre("Modifier un produit"));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerLabel("Nom du produit"));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerInputTexte('nomProd', 'nomProd', $produit->getNomProduit(), 0, '', ''));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerLabel('Description :'));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerInputTexte('description', 'description', $produit->getDescriptionProduit(), 0, "", ''));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerLabel("Photo"));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerInputTexte('photo', 'photo', $produit->getPhotoProduit(), 0, '', ''));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerLabel('Catégorie'));
        $formulaireModifProduit->ajouterComposantTab();

        foreach ($categorie as $categorie) {
            $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerRadio($categorie->getNomCat(), $categorie->getId(), "categorie", "categorie"));
            $formulaireModifProduit->ajouterComposantTab();
        }

        $formulaireModifProduit->ajouterComposantLigne($formulaireModifProduit->creerInputSubmit('modifProduit', 'modifProduit', "Sauvegarder les informations"));
        $formulaireModifProduit->ajouterComposantTab();

        $formulaireModifProduit->creerFormulaire();


    }
}

require_once('vues/producteurs/vueProducteursProduits.php');



