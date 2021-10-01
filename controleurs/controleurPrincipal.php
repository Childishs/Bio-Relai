<?php



if(isset($_GET['demandeConnexion'])){
    $_SESSION['controleurN1']="connexion";
}

else if(!isset($_POST['identififcation'])){
    $SESSSION['identification']['statut']="visiteurs";
    $SESSSION['controleurBioN1'] = $SESSION['identification']['statut'];
    $SESSSION['identification']['nom']=null;
    $SESSSION['identification']['prenom']=null;
    $SESSSION['identification']['login'] = null;
}
else{
    $_SESSION['controleurN1']="visiteurs";
}


include_once dispatcher::dispatch($_SESSION['controleurN1']);