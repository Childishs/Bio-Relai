<?php
require('lib/loader.php');
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title> bioRelai </title>
        <style type="text/css">
            @import url(styles/bioRelai.css);
        </style>
    </head>
    <body>
       <?php 
            if(isset($_SESSION['statut'])) {
                echo $_SESSION['statut'];
            }

            if(isset($_SESSION['error'])) {
                echo $_SESSION['error'];
            }

                echo password_hash("bonjour", PASSWORD_DEFAULT) .'<br/>';
                echo password_hash("bonjour", PASSWORD_DEFAULT) .'<br/>';
                echo password_hash("bonjour", PASSWORD_DEFAULT) .'<br/>';
                echo password_hash("bonjour", PASSWORD_DEFAULT) .'<br/>';
                echo password_hash("bonjour", PASSWORD_DEFAULT) .'<br/>';


            include_once('controleurs/controleurPrincipal.php');
       ?>
    <script src="scripts/scripts.js"></script>
    </body>
</html>