<?php

if(isset($_GET['demandeConnexion'])){
    $_SESSION['controleurN1']="connexion";
}
else{
    $_SESSION['controleurN1']="visiteurs";
}


if(isset($_POST['submitConnex'])) {
    // Demande connexion 
    // On check avec fonctions ici -> pas de big login, créa utilisateur, puis check sur fonction verif static (qui se trouve dans fonction)
}


$_SESSION['controleurN1'] = 'visiteurs';

include_once dispatcher::dispatch($_SESSION['controleurN1']);