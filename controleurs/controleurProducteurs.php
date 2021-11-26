<?php

if($_SESSION['user']['statut'] === 'producteurs'){
    $menuProducteur = new Menu("btnConnexion");
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Home","Producteurs"));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Produits","Produits"));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Ventes","Ventes"));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Factures","Factures"));
    $menuProducteur->creerMenu('0',"Producteurs");

    if(isset($_GET['Producteurs']) && $_GET['Producteurs'] === 'Produits'){
        require_once(dispatcher::dispatch('ProducteursProduits'));
        die();
    }
    elseif(isset($_GET['Producteurs']) && $_GET['Producteurs'] === 'Ventes'){
        require_once(dispatcher::dispatch('ProducteursVentes'));
        die();
    }
    elseif(isset($_GET['Producteurs']) && $_GET['Producteurs'] === 'Factures'){
        require_once(dispatcher::dispatch('ProducteursFactures'));
        die();
    }

    elseif(isset($_POST['ajoutProduit'])){
        //foreach pour récupérer les infos de la categorie
        if(!empty($_POST['nomProduit']) && !empty($_POST['descriptionProduit']) && !empty($_POST['photoProduit']) && !empty($_POST['categorie']) ){
            $nomProduit = htmlspecialchars($_POST['nomProduit']);
            $descriptionProduit = htmlspecialchars($_POST['descriptionProduit']);
            $photoProduit= htmlspecialchars($_POST['photoProduit']);
            $categorie = htmlspecialchars($_POST['categorie']);
        }
        $produit = new ProduitDTO();
        $produit->setNomProduit($nomProduit);
        $produit->setDescriptionProduit($descriptionProduit);
        $produit->setIdCategorie($categorie);
        $produit->setPhotoProduit($photoProduit);
        ProduitDAO::creerProduit($produit);

        require_once('vues/producteurs/vueProducteursProduits.php');
    }
    elseif(isset($_POST['modifProduit'])){
        if(!empty($_POST['nomProduit']) && !empty($_POST['descriptionProduit']) && !empty($_POST['photoProduit']) && !empty($_POST['categorie']) ){
            $nomProduit = htmlspecialchars($_POST['nomProduit']);
            $descriptionProduit = htmlspecialchars($_POST['descriptionProduit']);
            $photoProduit= htmlspecialchars($_POST['photoProduit']);
            $categorie = htmlspecialchars($_POST['categorie']);
        }
        $produit = new ProduitDTO();
        $produit->setNomProduit($nomProduit);
        $produit->setDescriptionProduit($descriptionProduit);
        $produit->setIdCategorie($categorie);
        $produit->setPhotoProduit($photoProduit);
        ProduitDAO::modifierProduit($produit);

        require_once(dispatcher::dispatch("ProducteursProduits"));
        die();
    }

    elseif(isset($_POST['suppProduit'])){
        $idProduit=htmlspecialchars($_POST('idProduit'));
        ProduitDAO::supprimerProduit($idProduit);

        require_once('vues/producteurs/vueProducteursProduits.php');
    }

    // mise en place du form
    $formulaireProducteur = new Formulaire('post','index.php','ProducteurModif','ProducteurModif');

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerTitre("Modifier mes informations"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Prénom"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('prenom', 'prenom', htmlspecialchars($_SESSION['user']['prenom']), 0,'', ''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Nom :'));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('nom','nom',htmlspecialchars($_SESSION['user']['nom']),0,"",''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("E-mail"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('email', 'email', htmlspecialchars($_SESSION['user']['email']), 0,'', ''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Ancien mot de Passe :'));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputMdp('mdp','mdp',0,"**********",''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Nouveau mot de passe :'));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputMdp('mdp2','mdp2',0,"Votre nouveau mot de passe",''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputSubmit('sauvegardeProducteur','sauvegardeProducteur',"Sauvegarder vos informations"));
    $formulaireProducteur->ajouterComposantTab();


    $formulaireProducteur->creerFormulaire();


    require_once("vues/producteurs/vueProducteurs.php");
}