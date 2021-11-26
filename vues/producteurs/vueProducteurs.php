<section id="'contenuProducteur">
    <header>
        <nav>
            <?php $menuProducteur->afficherMenu(); ?>
        </nav>
    </header>

    <section>
        <?php


        if (isset($_SESSION['message']) && !empty($_SESSION['message'])) {
            echo htmlspecialchars($_SESSION['message']);
            $_SESSION['message'] = "";
        }
        echo "<br/>";
        echo "<h1 class='title1'> Bienvenu à vous ". $_SESSION['user']['nom'].", </h1>" ;
        ?>
        <h2> En qualité de producteur, vous pouvez modifier les différents éléments suivants : </h2>
        <ul>
            <li> Vos informations telles que votre mot de passe ou e-mail </li>
            <li> Les différents produits (création, modification, suppression </li>
            <li> La gestion des ventes (ajout, suppression, modification) </li>
            <li> La mise en place des accords d'achat pour les utilisateurs </li>
            <li> La consultation de toutes vos factures </li>
        </ul>
        <?php
        echo "Voici vos informations";
            $formulaireProducteur->afficherFormulaire();
        ?>

    </section>
</section>
