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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
       <?php 

            include_once('controleurs/controleurPrincipal.php');
       ?>
    <script src="scripts/scripts.js"></script>
    </body>
</html>