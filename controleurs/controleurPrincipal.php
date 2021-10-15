<?php



if(isset($_GET['demandeConnexion'])){
    $_SESSION['controleurN1']="connexion";
}
/*
if(isset($_POST['submitConnex'])) {
    // Création de la partie User -> Création user et vérification 
    // Mise en place ici des sessions et infos 
}

if(!isset($_POST['identififcation'])){
    $SESSSION['identification']['statut']="visiteurs";
    $SESSSION['controleurBioN1'] = $SESSION['identification']['statut'];
    $SESSSION['identification']['nom']=null;
    $SESSSION['identification']['prenom']=null;
    $SESSSION['identification']['login'] = null;
}
*/

/*vérification des données entrées
*/
else if(isset($_POST['submitConnex'])){
    if(!empty($_POST['mdp'])&& !empty($_POST['login'])){
        $login = htmlspecialchars($_POST['login']);
        $mdp=htmlspecialchars($_POST['mdp']);
        // connexion 
        $Utilisateur = UtilisateurDAO::connexion($login, $mdp);        
        if($Utilisateur->getId()){
            $_SESSION['token']=$Utilisateur->getToken();
            $_SESSION['statut']=$Utilisateur->getStatut();
            dispatcher::dispatch($_SESSION['statut']);
        }
        else{
            $_SESSION['controleurN1']="visiteurs";
        }
    }
}


else if(isset($_POST['inscription'])){
    //vérification des informations remplies correctement et
    if(!empty($_POST['mdp']) && !empty(_POST['login']) && !empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['statut'])){
        $login = htmlspecialchars($_POST['login']);
        $mdp = htmlspecialchars($_POST['mdp']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $statut = htmlspecialchars($_POST['statut']);

        //ajout des informations le UtilisateurDTO créé
        $Utilisateur = new UtilisateurDTO();
        $Utilisateur->setmail($login);
        $Utilisateur->setMdp($mdp);
        $Utilisateur->setNomUtilisateur($nom);
        $Utilisateur->setPrenomUtilisateur($prenom);
        $Utilisateur->setStatut($statut);

        UtilisateurDAO::inscription($Utilisateur);
        dispatcher::dispatch($statut);
    }
    else{
        $_SESSION['controleurN1']="visiteurs";
    }

}
else{
    $_SESSION['controleurN1']="visiteurs";
}


elseif(isset($_GET['demandeInscription']))
{
    $_SESSION['controleurN1']="inscription";
}

elseif(isset($_GET['demandeDeconnexion']))
{
    $_SESSION['controleurN1']="visiteurs";
    $_SESSION['statut']= "visiteurs";
    $_SESSION['token'] = [];
}
elseif(!isset($_SESSION['statut'])){
    $_SESSION['controleurN1']="visiteurs";
}


include_once dispatcher::dispatch($_SESSION['controleurN1']);