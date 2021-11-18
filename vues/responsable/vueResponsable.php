

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

            if(isset($_SESSION['message']) && !empty($_SESSION['message'])) {
                echo htmlspecialchars($_SESSION['message']);
                $_SESSION['message'] = "";
            }

            echo "<br/>";
            echo "Bienvenu à vous Responsable ! Voici vos infos !<br/>" ;
            echo "Votre magnfique nom de l'amour est :  " . $_SESSION['user']['nom'] . "<br/>";
            echo "TODO accès aux producteurs <br/>";
            echo "TODO à la gestion de vente en cours <br/>";
            echo "TODO autorisations de commandes <br/>";
            echo "TODO aux autorisations de vente <br/>";
            echo "TODO Ajouter de nouvelles catégories <br/>";
            echo "TODO Inspecter les factures (clients et producteurs) <br/>";
            echo "-----_> update porducteurs marche pas (bdd ok, req ok, data ok -> wtf ?";
            var_dump($_SESSION);


            $formulaireResponsable->afficherFormulaire();
            ?>
    </section>
</section>