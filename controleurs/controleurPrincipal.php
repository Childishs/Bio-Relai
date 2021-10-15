<?php



if(isset($_GET['demandeConnexion'])){
    $_SESSION['controleurN1']="connexion";
}

/*


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
    if(!empty($_POST['mdp']) && !empty($_POST['login'])){
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

else if(isset($_POST['submitInscription'])){
    //vérification des informations remplies correctement et
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
        $Utilisateur->setStatut('ADHERENT');

        var_dump($nom);

        UtilisateurDAO::inscription($Utilisateur);
        dispatcher::dispatch($_SESSION['user']['statut']);
    }
    
} elseif(isset($_GET['demandeInscription']))
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
else{
    $_SESSION['controleurN1']="visiteurs";
}





include_once dispatcher::dispatch($_SESSION['controleurN1']);