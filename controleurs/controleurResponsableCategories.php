<?php 


    $menuFermerConnexion = new Menu('fermerConnexion');
    $menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
    $menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');


// MIse en place des cat 

$categories = CategorieDAO::getAll();


// Formulaire d'inscription producteur 
$formulaireResponsable = new Formulaire('post','index.php','ajoutCat','ajoutCat');
    
$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Créer une catégorie"));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Catégorie : "));
$formulaireResponsable->ajouterComposantTab();

$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('categorie', 'categorie', '', 1,'Nom de la catégorie', ''));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('ajoutCat','ajoutCat',"Créer la catégorie"));
$formulaireResponsable->ajouterComposantTab();


$formulaireResponsable->creerFormulaire();



if(isset($_GET['id']) && isset($_GET['action'])) {
    if($_GET['action'] === "delete") {
        CategorieDAO::delete(htmlspecialchars($_GET['id']));
        $_SESSION['message'] = "Élément supprimé avec succès";

    } else if($_GET['action'] === "toUpdate") {

    $cat = CategorieDAO::getOne(htmlspecialchars($_GET['id'])); 
    $formulaireResponsable = new Formulaire('post','index.php','updateCat','updateCat');
    
    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Modifier une catégorie"));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Id : "));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('id', 'id', $cat->getId(), 1,'', 'readonly'));
    $formulaireResponsable->ajouterComposantTab();

    $_SESSION['idCat'] = $cat->getId();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Catégorie : "));
    $formulaireResponsable->ajouterComposantTab();

    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('categorie', 'categorie', $cat->getNomCat(), 1,'', ''));
    $formulaireResponsable->ajouterComposantTab();


    $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('updateCat','updateCat',"Modifier la catégorie"));
    $formulaireResponsable->ajouterComposantTab();


    $formulaireResponsable->creerFormulaire();
    }
}



require_once('vues/responsable/vueResponsableCategories.php');