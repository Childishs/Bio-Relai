

<section id="contenueResponsable">
    <header>
        <nav>
            <?php 
            $menuResponsable->afficherMenu();
            ?>

        </nav>
    </header>

    <section>
        <?php 
            echo "Bienvenu à vous Responsable ! Voici vos infos !<br/>" ;
            echo "Votre magnfique nom de l'amour est :  " . $_SESSION['user']['nom'] . "<br/>";
            echo "Pour modifier vos informations, cliquez ici <br/>";
            echo "Pour accéder aux producteurs <br/>";
            echo "Pour accéder à la gestion de vente en cours <br/>";
            echo "Pour accéder autorisations de commandes <br/>";
            echo "Pour accéder aux autorisations de vente <br/>";
            echo "Ajouter de nouvelles catégories <br/>";
            echo "Inspecter les factures (clients et producteurs) <br/>";
            var_dump($_SESSION);


            $formulaireResponsable->afficherFormulaire();
            ?>
    </section>
</section>