<?php



if(isset($_GET['demandeConnexion'])){
    $_SESSION['controleurN1']="connexion";
}

else if(isset($_SESSION['user']) && !empty($_SESSION['user'])) {
    $_SESSION['controleurN1'] = $_SESSION['user']['statut'];
}

/*vérification des données entrées
*/
else if(isset($_POST['submitConnex'])){
    if(!empty($_POST['mdp']) && !empty($_POST['login'])){
        $login = htmlspecialchars($_POST['login']);
        $mdp=htmlspecialchars($_POST['mdp']);
        // connexion
        $Utilisateur = UtilisateurDAO::connexion($login, $mdp);
        if($Utilisateur->getMail()){
            $_SESSION['token']=$Utilisateur->getToken();
            $_SESSION['statut']=$Utilisateur->getStatut();
            $_SESSION['controleurN1'] = $_SESSION['statut'];
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
        $Utilisateur->setStatut('adherents');

        //a voir
        UtilisateurDAO::inscription($Utilisateur);

        $_SESSION['controleurN1'] = $_SESSION['user']['statut'];
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
