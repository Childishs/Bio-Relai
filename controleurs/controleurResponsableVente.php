<?php 


if(isset($_GET['id']) && isset($_GET['action'])) {
    if($_GET['action'] === "delete") {
        VentesDAO::delete(htmlspecialchars($_GET['id']));
        $_SESSION['message'] = "Élément supprimé avec succès";
    }
}

$ventes = VentesDAO::getAll(); 

$formulaireVente = new Formulaire('post','index.php','ajoutVente','ajoutVente');
    
$formulaireVente->ajouterComposantLigne($formulaireVente->creerTitre("Ajouter une vente"));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerLabel("Début date mise en place producteur : "));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputDate("debutProd", "debutProd", "required"));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerLabel("Fin date mise en place producteur : "));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputDate("finprod", "finprod", "required"));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerLabel("Début date mise en place achat : "));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputDate("debutAchat", "debutAchat", "required"));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerLabel("Fin date mise en place achat : "));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputDate("finAchat", "finAchat", "required"));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerLabel("Autorisation pour dépot producteur à la date de début : "));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputTexte("EtatProd", "EtatProd", "", 1, "OUVERT \ FERME", ""));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerLabel("Autorisation pour achat des utilisateurs à la date de début : "));
$formulaireVente->ajouterComposantTab();

$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputTexte("EtatAchat", "EtatAchat", "", 1, "OUVERT \ FERME", ""));
$formulaireVente->ajouterComposantTab();



$formulaireVente->ajouterComposantLigne($formulaireVente->creerInputSubmit('ajoutVente','ajoutVente',"Créer la vente"));
$formulaireVente->ajouterComposantTab();


$formulaireVente->creerFormulaire();


require_once 'vues/responsable/vueResponsableVente.php';