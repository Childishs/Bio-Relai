<?php

if(isset($_GET['demandeConnexion'])){
    $_SESSION['controleurN1']="connexion";
}
else{
    $_SESSION['controleurN1']="visiteurs";
}

$_SESSION['controleurN1'] = 'visiteurs';

include_once dispatcher::dispatch($_SESSION['controleurN1']);