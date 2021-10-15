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
        var_dump($Utilisateur);
        
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
else{
    $_SESSION['controleurN1']="visiteurs";
}


include_once dispatcher::dispatch($_SESSION['controleurN1']);