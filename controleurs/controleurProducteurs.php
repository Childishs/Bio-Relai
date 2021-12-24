<?php

if($_SESSION['user']['statut'] === 'producteurs') {
    $menuProducteur = new Menu("btnConnexion");
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Home", "Producteurs"));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Produits", "Produits"));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Ventes", "Ventes"));
    $menuProducteur->ajouterComposant($menuProducteur->creerItemLien("Factures", "Factures"));
    $menuProducteur->creerMenu('0', "Producteurs");

    if (isset($_GET['Producteurs']) && $_GET['Producteurs'] === 'Produits') {
        require_once(dispatcher::dispatch('ProducteursProduits'));
        die();
    } elseif (isset($_GET['Producteurs']) && $_GET['Producteurs'] === 'Ventes') {
        require_once(dispatcher::dispatch('ProducteursVentes'));
        die();
    } elseif (isset($_GET['Producteurs']) && $_GET['Producteurs'] === 'Factures') {
        require_once(dispatcher::dispatch('ProducteursFactures'));
        die();
    } elseif (isset($_GET['Producteurs']) && $_GET['Producteurs'] === "Deco") {
        $_SESSION['statut'] = "visiteurs";
        $_SESSION['token'] = [];
        $_SESSION['user'] = [];
        include_once dispatcher::dispatch('visiteurs');
        die();
    }


    if(isset($_POST['ajoutProduit'])){
        //foreach pour récupérer les infos de la categorie
        if(!empty($_POST['nomProd']) && !empty($_POST['description']) && !empty($_POST['categorie']) ){
            $nomProduit = htmlspecialchars($_POST['nomProd']);
            $descriptionProduit = htmlspecialchars($_POST['description']);
            $categorie = htmlspecialchars($_POST['categorie']);
        }

          // ici on vérifie que l'envoie n'a pas eu d'erreur
          if(isset($_FILES['photo']) && !empty($_FILES['photo'])) {

            // On vérifie la taille du fichier
            if($_FILES['photo']['size'] <= 20000000){
            
            // On récupère les infos dans un arrya (notament l'extension)
                $informations = pathinfo($_FILES['photo']['name']);
            
            // qu'on enregistre dans une var
                @$extensionFichier = $informations['extension'];
            
            // On créer une variable comprenant tous les extensions acceptées
                $extensionAutorisee = array('png','jpg','gif','JPEG','pdf','svg');
            
            // On vérifie si dans l'array d'extension autorisé se trouve l'exention du fichier
                if(in_array($extensionFichier, $extensionAutorisee)) {
            
                // Si tout est bon, alors on envoie
                // Ne pas oubliez de concatener le point pour l'ajout de l'extension
                $addresse = 'images/'.time().rand().'.'.$extensionFichier;
            
                // avec cette fonction on bouge le fichier avec son nom temporaire à l'adresse de fin (avec son nom de fin)
                move_uploaded_file($_FILES['photo']['tmp_name'], $addresse);
            
                $photo = $addresse;

                } else {
                    $photo = "https://images.pexels.com/photos/1656666/pexels-photo-1656666.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
                }}else {
                    $photo = "https://images.pexels.com/photos/1656666/pexels-photo-1656666.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
                }}else {
                    $photo = "https://images.pexels.com/photos/1656666/pexels-photo-1656666.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260";
                }

        
        $produit = new ProduitDTO();
        $produit->setNomProduit($nomProduit);
        $produit->setDescriptionProduit($descriptionProduit);
        $produit->setIdCategorie($categorie);
        $produit->setIdUtilisateur($_SESSION['user']['id']);
        $produit->setPhotoProduit($photo);
        ProduitDAO::creerProduit($produit);

        require_once(dispatcher::dispatch('ProducteursProduits'));
        die();
    }


    if(isset($_POST['modifProduit'])){
        if(!empty($_POST['nomProd']) && !empty($_POST['description']) && !empty($_POST['categorie']) ){
            $nomProduit = htmlspecialchars($_POST['nomProd']);
            $description = htmlspecialchars($_POST['description']);
            $categorie = htmlspecialchars($_POST['categorie']);
        }
        $photo = null;
         // ici on vérifie que l'envoie n'a pas eu d'erreur
         if(isset($_FILES['photo']) && !empty($_FILES['photo'])) {

            // On vérifie la taille du fichier
            if($_FILES['photo']['size'] <= 20000000){
            
            // On récupère les infos dans un arrya (notament l'extension)
                $informations = pathinfo($_FILES['photo']['name']);
            
            // qu'on enregistre dans une var
                @$extensionFichier = $informations['extension'];
            
            // On créer une variable comprenant tous les extensions acceptées
                $extensionAutorisee = array('png','jpg','gif','JPEG','pdf','svg');
            
            // On vérifie si dans l'array d'extension autorisé se trouve l'exention du fichier
                if(in_array($extensionFichier, $extensionAutorisee)) {
            
                // Si tout est bon, alors on envoie
                // Ne pas oubliez de concatener le point pour l'ajout de l'extension
                $addresse = 'images/'.time().rand().'.'.$extensionFichier;
            
                // avec cette fonction on bouge le fichier avec son nom temporaire à l'adresse de fin (avec son nom de fin)
                move_uploaded_file($_FILES['photo']['tmp_name'], $addresse);
            
                $photo = $addresse;

                }}} 

        $produit = new ProduitDTO();
        $produit->setIdProduit($_SESSION['productId']);
        $produit->setNomProduit($nomProduit);
        $produit->setDescriptionProduit($description);
        $produit->setIdCategorie($categorie);
        $produit->setIdUtilisateur($_SESSION['user']['id']);
        $produit->setPhotoProduit($photo);
        ProduitDAO::modifierProduit($produit);

        require_once(dispatcher::dispatch("ProducteursProduits"));
        die();
    }



    
    if(isset($_POST['ajoutProdVente'])){
        //foreach pour récupérer les infos de la categorie
       
            $idProduit = htmlspecialchars($_POST['produit']);
            $prix = htmlspecialchars($_POST['prix']);
            $quantite = htmlspecialchars($_POST['nbProd']);
            $idVente = htmlspecialchars($_POST['vente']);
        
        $produit = new ProduitDTO();
        $produit->setIdProduit($idProduit);
        $produit->setPrix($prix);
        $produit->setQuantite($quantite);

        ProduitDAO::creerProduitVente($produit,$idVente);

        require_once(dispatcher::dispatch("ProducteursVentes"));
        die();
    }



    if(isset($_POST['modifProduitVente'])){
        $prix = htmlspecialchars($_POST['prix']);
        $quantite = htmlspecialchars($_POST['quantite']);

        $produit = new ProduitDTO();
        $produit->setIdProduit($_SESSION['idProduit']);
        $produit->setPrix($prix);
        $produit->setQuantite($quantite);
        ProduitDAO::modifProduitVente($produit, $_SESSION['idVente']);

        require_once(dispatcher::dispatch("ProducteursVentes"));
        die();
    }



    if(isset($_POST['sauvegardeProducteur'])) {
        if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['commune']) && !empty($_POST['codePostal']) && !empty($_POST['descriptif'])) {
            $token = $_SESSION['user']['token'];
            // if($_SESSION['tokenAdMod'] ==  $token) {
                $nom = htmlspecialchars($_POST['nom']); 
                $prenom = htmlspecialchars($_POST['prenom']); 
                $email = htmlspecialchars($_POST['email']); 
                // prod 
                $adresse = htmlspecialchars($_POST['adresse']); 
                $commune = htmlspecialchars($_POST['commune']); 
                $codePostal = htmlspecialchars($_POST['codePostal']); 
                $descriptif = htmlspecialchars($_POST['descriptif']); 

               
            // ici on vérifie que l'envoie n'a pas eu d'erreur
            if(isset($_FILES['photo']) && !empty($_FILES['photo'])) {

                // On vérifie la taille du fichier
                if($_FILES['photo']['size'] <= 20000000){
                
                // On récupère les infos dans un arrya (notament l'extension)
                    $informations = pathinfo($_FILES['photo']['name']);
                
                // qu'on enregistre dans une var
                    @$extensionFichier = $informations['extension'];
                
                // On créer une variable comprenant tous les extensions acceptées
                    $extensionAutorisee = array('png','jpg','gif','JPEG','pdf','svg');
                
                // On vérifie si dans l'array d'extension autorisé se trouve l'exention du fichier
                    if(in_array($extensionFichier, $extensionAutorisee)) {
                
                    // Si tout est bon, alors on envoie
                    // Ne pas oubliez de concatener le point pour l'ajout de l'extension
                    $addresse = 'images/'.time().rand().'.'.$extensionFichier;
                
                    // avec cette fonction on bouge le fichier avec son nom temporaire à l'adresse de fin (avec son nom de fin)
                    move_uploaded_file($_FILES['photo']['tmp_name'], $addresse);
                
                    $photo = $addresse;

                    }}}


                $prod = new UtilisateurDTO();
                $prod->setToken($token);
                $prod->setNomUtilisateur($nom);
                $prod->setPrenomUtilisateur($prenom);
                $prod->setmail($email);
                UtilisateurDAO::update($prod); 

                // UPdate producteur 
                $producteur = new ProducteursDTO();
                $producteur->setAdresseProducteur($adresse);
                $producteur->setCodePostalProducteur($codePostal);
                $producteur->setCommuneProducteur($commune);
                $producteur->setDescriptifProducteur($descriptif);
                @$producteur->setPhotoProducteur($photo);

                // Recup Id pour updateProducteur
                $re = UtilisateurDAO::getOne($token);
                $id = $re->getId();

                ProducteurDAO::update($producteur, $id);
                
                $_SESSION['message'] = "Modification prise en compte";
                
            //}
        }
    }

    // mise en place du form
    $formulaireProducteur = new Formulaire('post','index.php','ProducteurModif','ProducteurModif');

    $producteur = ProducteurDAO::getOneProducteurs($_SESSION['user']['token']);

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerTitre("Modifier mes informations"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Prénom"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('prenom', 'prenom', $producteur->getPrenomUtilisateur(), 0,'', ''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Nom :'));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('nom','nom',$producteur->getNomUtilisateur(),0,"",''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("E-mail"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('email', 'email', $producteur->getMail(), 0,'', ''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel('Nouveau mot de passe :'));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputMdp('mdp2','mdp2',0,"Votre nouveau mot de passe",''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Adresse"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('adresse', 'adresse', $producteur->getAdresseProducteur(), 1,'Adresse du producteur', ''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Commune"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('commune', 'commune', $producteur->getCommuneProducteur(), 1,'Commune du producteur', ''));
    $formulaireProducteur->ajouterComposantTab();


    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Code Postal"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('codePostal', 'codePostal', $producteur->getCodePostalProducteur(), 1,'Code postal du producteur', ''));
    $formulaireProducteur->ajouterComposantTab();


    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Descriptif"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputTexte('descriptif', 'descriptif', $producteur->getDescriptifProducteur(), 1,'Descriptif du producteur', ''));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerLabel("Photo producteur"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputPhoto('photo', 'photo'));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->ajouterComposantLigne($formulaireProducteur->creerInputSubmit('sauvegardeProducteur','sauvegardeProducteur',"Sauvegarder vos informations"));
    $formulaireProducteur->ajouterComposantTab();

    $formulaireProducteur->creerFormulaire();


    require_once("vues/producteurs/vueProducteurs.php");

}