<section id="'conteneuVisiteurs">
    <header>
        <nav>
            <?php $menuProducteur->afficherMenu(); ?>
        </nav>
    </header>

    <section>

        <?php // echo $laListeProducteurs;
        echo "Voici vos Produits ! </br>";
        echo "</br>N'hésitez pas à en ajouter des nouveaux !</br>";

        $listeVentes->afficherListe();
        ?>

        <br>
        <br>
        <?php
        $formulaire->afficherFormulaire();
        ?>






    </section>
</section>
