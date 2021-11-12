<section id="conteneuVisiteurs">
    <header>
        <nav>
            <?php  $menuInscription->afficherMenu();
            // $menuConnexion->afficheMenu(); ?>
        </nav>
    </header>

    <section>
        <?php // echo $laListeProducteurs; 
            
            echo "Bienvenu à vous adhérent ! Voici vos infos !";
            echo "Votre magnfique nom de l'amour est :  " . $user->getNom();
            ?>
    </section>
</section>