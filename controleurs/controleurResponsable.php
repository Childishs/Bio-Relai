<?php 
if($_SESSION['user']['statut'] === "responsable") {


    $menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Catégories", "ResponsableCategories"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Factures", "ResponsableFacture"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Ventes", "ResponsableVente"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Deconnexion", "Deco"));



    // $menuResponsable = $menuResponsable->creerMenu('0','demandeConnexion');
    $menuResponsable->creerMenu('0','Responsable');


    if(isset($_GET['Responsable'])) {
        if($_GET['Responsable'] === 'ResponsableProducteurs') {
            require_once(dispatcher::dispatch('ResponsableProducteurs'));
            die();
        }
        elseif($_GET['Responsable'] === "ResponsableCategories") {
            require_once(dispatcher::dispatch('ResponsableCategories'));
            die();
        } 
        elseif($_GET['Responsable'] === "ResponsableFacture") {
            require_once(dispatcher::dispatch(('ResponsableFacture')));
            die();
        } 
        elseif($_GET['Responsable'] === "ResponsableVente") {
            require_once(dispatcher::dispatch(('ResponsableVente')));
           die();
        }elseif($_GET['Responsable'] === "Deco") {
            $_SESSION['statut']= "visiteurs";
            $_SESSION['token'] = [];
            $_SESSION['user'] = [];
            include_once dispatcher::dispatch('visiteurs');
            die();
        }
    }
    if(isset($_POST['updateCat'])) {
        if(!empty($_POST['id']) && !empty($_POST['categorie'])) {
            $id = htmlspecialchars($_POST['id']);
            if($_SESSION['idCat'] ==  $id) {
                $categorie = htmlspecialchars($_POST['categorie']); 
                $cat = new CategorieDTO();
                $cat->setId($id);
                $cat->setNomCat($categorie);
                CategorieDAO::update($cat);
                require_once(dispatcher::dispatch('ResponsableCategories'));
                $_SESSION['message'] = "Modification prise en compte";
                die();
            }
        }
    }


    if(isset($_POST['upDateVente'])) {
        if(!empty($_POST['EtatProd']) && !empty($_POST['EtatAchat']) && !empty($_POST['debutProd']) && !empty($_POST['finprod']) && !empty($_POST['debutAchat']) && !empty($_POST['finAchat'])){
            $debutProd = htmlspecialchars($_POST['debutProd']);
            $id = htmlspecialchars($_POST['id']);
            $finProd = htmlspecialchars($_POST['finprod']);
            $debutAchat = htmlspecialchars($_POST['debutAchat']);
            $finAchat = htmlspecialchars($_POST['finAchat']);
            $etatProd = htmlspecialchars($_POST['EtatProd']);
            $etatAchat = htmlspecialchars($_POST['EtatAchat']);

            $vente = new VentesDTO();
            $vente->setId($id);
            $vente->setDateDebutProd($debutProd);
            $vente->setDateFinProd($finProd);
            $vente->setDateVente($debutAchat);
            $vente->setDateFinCli($finAchat);
            $vente->setEtatProd($etatProd);
            $vente->setEtatAchat($etatAchat);

            VentesDAO::update($vente);
            require_once(dispatcher::dispatch(('ResponsableVente')));
            die();
        }
    }

  

    if(isset($_POST['modifProd'])) {
        if(!empty($_POST['id']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['commune']) && !empty($_POST['codePostal']) && !empty($_POST['descriptif'])) {
            $token = $_POST['id'];
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
                    $extensionFichier = $informations['extension'];
                
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
                $producteur->setPhotoProducteur($photo);

                // Recup Id pour updateProducteur
                $re = UtilisateurDAO::getOne($token);
                $id = $re->getId();

                ProducteurDAO::update($producteur, $id);
                
                require_once(dispatcher::dispatch('ResponsableProducteurs'));
                $_SESSION['message'] = "Modification prise en compte";
                die();
            //}
        }
    }

    if(isset($_POST['ajoutProd'])) {
        // Création d'un producteur 
        if(!empty($_POST['mdp']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email']) && !empty($_POST['adresse']) && !empty($_POST['commune']) && !empty($_POST['codePostal']) && !empty($_POST['descriptif'])) {
            $login = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            // Cote prod 
            $adresse = htmlspecialchars($_POST['adresse']); 
            $commune = htmlspecialchars($_POST['commune']); 
            $codePostal = htmlspecialchars($_POST['codePostal']); 
            $descriptif = htmlspecialchars($_POST['descriptif']);
            

            // ici on vérifie que l'envoie n'a pas eu d'erreur
            if(isset($_FILES['photo'])) {

                // On vérifie la taille du fichier
                if($_FILES['photo']['size'] <= 20000000){
                
                // On récupère les infos dans un arrya (notament l'extension)
                    $informations = pathinfo($_FILES['photo']['name']);
                
                // qu'on enregistre dans une var
                    $extensionFichier = $informations['extension'];
                
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

                    }else {
                        $photo = "https://images.pexels.com/photos/96715/pexels-photo-96715.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500";
                    }}else {
                        $photo = "https://images.pexels.com/photos/96715/pexels-photo-96715.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500";
                    }} else {
                        $photo = "https://images.pexels.com/photos/96715/pexels-photo-96715.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500";
                    }

    
            //ajout des informations le UtilisateurDTO créé
            $Utilisateur = new UtilisateurDTO();
            $Utilisateur->setmail($login);
            $Utilisateur->setMdp($mdp);
            $Utilisateur->setNomUtilisateur($nom);
            $Utilisateur->setPrenomUtilisateur($prenom);
            $Utilisateur->setStatut('producteurs');

            UtilisateurDAO::inscription($Utilisateur);
            // Ajout prod 
            $producteur = new ProducteursDTO();
            $producteur->setAdresseProducteur($adresse);
            $producteur->setCodePostalProducteur($codePostal);
            $producteur->setCommuneProducteur($commune);
            $producteur->setDescriptifProducteur($descriptif);
            $producteur->setPhotoProducteur($photo);
            //a voir
            ProducteurDAO::inscription($producteur, $_SESSION['transac']);

            require_once(dispatcher::dispatch(('ResponsableProducteurs')));
            die(); 
        }
    }



    if(isset($_POST['ajoutVente'])) {
        if(!empty($_POST['EtatProd']) && !empty($_POST['EtatAchat']) && !empty($_POST['debutProd']) && !empty($_POST['finprod']) && !empty($_POST['debutAchat']) && !empty($_POST['finAchat'])){
            $debutProd = htmlspecialchars($_POST['debutProd']);
            $finProd = htmlspecialchars($_POST['finprod']);
            $debutAchat = htmlspecialchars($_POST['debutAchat']);
            $finAchat = htmlspecialchars($_POST['finAchat']);
            $etatProd = htmlspecialchars($_POST['EtatProd']);
            $etatAchat = htmlspecialchars($_POST['EtatAchat']);
            

            // test ici pour la durée (si la fin est avant le début, c'est bof)


            $vente = new VentesDTO();
            $vente->setDateDebutProd($debutProd);
            $vente->setDateFinProd($finProd);
            $vente->setDateVente($debutAchat);
            $vente->setDateFinCli($finAchat);
            $vente->setEtatProd($etatProd);
            $vente->setEtatAchat($etatAchat);

            VentesDAO::create($vente);
            require_once(dispatcher::dispatch(('ResponsableVente')));
            die();

        }
    }


  

    if(isset($_POST['ajoutCat'])) {
        // Création d'un producteur 
        if(!empty($_POST['categorie'])){
            $nomCat = htmlspecialchars($_POST['categorie']);
    
            //ajout des informations le UtilisateurDTO créé
            $categorie = new CategorieDTO();
            $categorie->setNomCat($nomCat);
    
            //a voir
            CategorieDAO::create($categorie);
            $_SESSION['message'] = "DAMN DANIEL IS THAT A NEW CATEGORIE  ? hotsmiley SWGA ";
            require_once(dispatcher::dispatch(('ResponsableCategories')));
            die();  
        }
    }


    if(isset($_POST['sauvegardeResp'])) {
        // MODIFICATION COMPTE POUR RESPONSABLE (Il se modifie lui même)
            $email = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp2']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
    
            $Utilisateur = new UtilisateurDTO();
            $UtilisateurActif = new UtilisateurDTO();
            $UtilisateurActif = UtilisateurDAO::getOne($_SESSION['user']['token']);
    
            // On vérifie les types de demande faites et leurs valeurs 
            // Si c'est null, on remplacera par les valeurs actuelles de l'objet 
            $mdp != null ? $Utilisateur->setMdp($mdp) : $Utilisateur->setMdp($UtilisateurActif->getMdp());
            $email != null ? $Utilisateur->setmail($email) : $Utilisateur->setmail($UtilisateurActif->getMail());
            $nom != null ? $Utilisateur->setNomUtilisateur($nom) : $Utilisateur->setNomUtilisateur($UtilisateurActif->getNomUtilisateur());
            $prenom != null ? $Utilisateur->setPrenomUtilisateur($prenom) : $Utilisateur->setPrenomUtilisateur($UtilisateurActif->getPrenomUtilisateur());
            $Utilisateur->setToken($_SESSION['user']['token']);
    
           // var_dump($UtilisateurActif);
    
        UtilisateurDAO::update($Utilisateur);
        $_SESSION['message'] = "Vos modifications ont bien été prises en compte";
    
    }  
    
        // mise en place du form
        $formulaireResponsable = new Formulaire('post','index.php','RespUpdate','RespUpdate');
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerTitre("Modifier mes informations"));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("Prénom"));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('prenom', 'prenom', htmlspecialchars($_SESSION['user']['prenom']), 0,'', ''));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Nom :'));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('nom','nom',htmlspecialchars($_SESSION['user']['nom']),0,"",''));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel("E-mail"));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputTexte('email', 'email', htmlspecialchars($_SESSION['user']['email']), 0,'', ''));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Ancien mot de Passe :'));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputMdp('mdp','mdp',0,"**********",''));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerLabel('Nouveau mot de passe :'));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputMdp('mdp2','mdp2',0,"Votre nouveau mot de passe",''));
        $formulaireResponsable->ajouterComposantTab();
    
        $formulaireResponsable->ajouterComposantLigne($formulaireResponsable->creerInputSubmit('sauvegardeResp','sauvegardeResp',"Sauvegarder vos informations"));
        $formulaireResponsable->ajouterComposantTab();
    
       
        $formulaireResponsable->creerFormulaire();
        
        
    

    require_once('vues/responsable/vueResponsable.php');
}


