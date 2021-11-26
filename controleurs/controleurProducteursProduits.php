<?php



$menuFermerConnexion = new Menu('fermerConnexion');
$menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
$menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');
// récupérer tous les producteurs

$produits = ProduitDAO::getAll($_SESSION['user']['id']);

$categorie=CategorieDAO::getAll();



//Création d'un formulaire pour l'ajout d'un produit
$formulaireProducteur = new Formulaire('post','index.php','ajoutProduit','ajoutProd');

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerTitre("Creer produit"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Nom du produit"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('nomProd', 'nomProd',"", 0,'', 'Nom du Produit'));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Description :'));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('description','description',"",0,"","Description"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Photo"));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('photo', 'photo', "", 0,'', 'Photo'));
$formulaireProducteur->ajouterComposantTab();

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Catégorie'));
$formulaireProducteur->ajouterComposantTab();

foreach($categorie as $categorie){
    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerRadio("categorie",$categorie->getNomCat(),"categorie",$categorie->getId()));
    $formulaireProducteur->ajouterComposantTab();
}

$formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputSubmit('ajoutProduit','ajoutProduit',"Ajouter le Produit"));
$formulaireProducteur->ajouterComposantTab();


$formulaireProducteur->creerFormulaire();

if(isset($_GET['id']) && isset($_GET['action'])) {
    if ($_GET['action'] === "delete") {
        ProduitDAO::supprimerProduit(htmlspecialchars($_GET['id']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    } else if ($_GET['action'] === "toUpdate") {

        $prod = ProduitDAO::getOne(htmlspecialchars($_GET['id']));


        //Création d'un formulaire pour la modification d'un produit
        $formulaireProducteur = new Formulaire('post', 'index.php', 'modifProduit', 'modifProduit');

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerTitre("Modifier un produit"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Nom du produit"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('nomProd', 'nomProd', $prod->getNomProduit(), 0, '', ''));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Description :'));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('description', 'description', $prod->getDescriptionProduit(), 0, "", ''));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Photo"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('photo', 'photo', $prod->getPhotoProduit(), 0, '', ''));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Catégorie'));
        $formulaireProducteur->ajouterComposantTab();

        foreach($categorie as $categorie){
            $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerRadio("categorie",$categorie->getNomCat(),"categorie",$categorie->getId()));
            $formulaireProducteur->ajouterComposantTab();
        }
        $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputSubmit('modifProduit', 'modifProduit', "Sauvegarder les informations"));
        $formulaireProducteur->ajouterComposantTab();

        $formulaireProducteur->creerFormulaire();

    }
}

require_once('vues/producteurs/vueProducteursProduits.php');



