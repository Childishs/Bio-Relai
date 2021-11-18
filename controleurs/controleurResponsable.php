<?php 
if($_SESSION['user']['statut'] === "responsable") {


    $menuResponsable = new Menu('btnConnexion');
    // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Home","Responsable"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Producteurs","ResponsableProducteurs"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Catégories", "ResponsableCategories"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Factures", "ResponsableFacture"));
    $menuResponsable->ajouterComposant($menuResponsable->creerItemLien("Ventes", "ResponsableVente"));


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
        }
    }

    if(isset($_POST['ajoutVente'])) {
        if(!empty($_POST['debutProd']) && !empty($_POST['finprod']) && !empty($_POST['debutAchat']) && !empty($_POST['finAchat'])){
            $debutProd = htmlspecialchars($_POST['debutProd']);
            $finProd = htmlspecialchars($_POST['finprod']);
            $debutAchat = htmlspecialchars($_POST['debutAchat']);
            $finAchat = htmlspecialchars($_POST['finAchat']);

            $vente = new VentesDTO();
            $vente->setDateDebutProd($debutProd);
            $vente->setDateFinProd($finProd);
            $vente->setDateVente($debutAchat);
            $vente->setDateFinCli($finAchat);

            VentesDAO::create($vente);
            require_once(dispatcher::dispatch(('ResponsableVente')));
            die();

        }
    }


    if(isset($_POST['ajoutProd'])) {
        // Création d'un producteur 
        if(!empty($_POST['mdp']) && !empty($_POST['email']) && !empty($_POST['nom']) && !empty($_POST['prenom'])){
            $login = htmlspecialchars($_POST['email']);
            $mdp = htmlspecialchars($_POST['mdp']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
    
            //ajout des informations le UtilisateurDTO créé
            $Utilisateur = new UtilisateurDTO();
            $Utilisateur->setmail($login);
            $Utilisateur->setMdp($mdp);
            $Utilisateur->setNomUtilisateur($nom);
            $Utilisateur->setPrenomUtilisateur($prenom);
            $Utilisateur->setStatut('producteurs');
    
            //a voir
            UtilisateurDAO::inscription($Utilisateur);
            $_SESSION['message'] = "DAMN DANIEL IS THAT A NEW USER ? hotsmiley ";
            require_once(dispatcher::dispatch(('ResponsableProducteurs')));
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
            require_once(dispatcher::dispatch(('ResponsableCategorie')));
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

    $menuFermerConnexion = new Menu('fermerConnexion');
    $menuFermerConnexion->ajouterComposant($menuFermerConnexion->creerItemImage('deconnexion','fermer',''));
    $menuFermerConnexion->creerMenuImage('0','demandeDeconnexion');

        

    
    
        // Menu - Accès interne
    
        $formulaireRouting = new Menu("InsideResp");
    
         // $menuResponsable->ajouterComposant($menuConnexion->creerItemLien('Connexion','connexion'));
         $formulaireRouting->ajouterComposant($formulaireRouting->creerItemLien("Producteurs","ResponsableProducteurs"));
         $formulaireRouting->ajouterComposant($formulaireRouting->creerItemLien("Compte","ResponsableCompte"));
     
         // $menuResponsable = $menuResponsable->creerMenu('0','demandeConnexion');
         $formulaireRouting->creerMenu('0','Responsable');
     
    
    
    
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


