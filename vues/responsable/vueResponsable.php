

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
            echo "<h1 class='title1'> Bienvenu à vous ". $_SESSION['user']['nom'].", </h1>" ;
           ?>

            <h2> En qualité de responsable, vous pouvez modifier les différents éléments suivants : </h2>
            <ul>
                <li> Les producteurs (informations de compte) </li>
                <li> Les catégories (ajout, modification et suppression) </li>
                <li> La gestion des ventes (ajout, suppression, modification) </li>
                <li> La mise en place des accords de mise en vente pour les producteurs </li>
                <li> La mise en place des accords d'achat pour les utilisateurs </li>
                <li> La consultation de toutes les factures </li>
            </ul>


            <?php 

            echo " <div class='container'>";
            $formulaireResponsable->afficherFormulaire();
            echo "</div>";
            ?>

    </section>
</section>