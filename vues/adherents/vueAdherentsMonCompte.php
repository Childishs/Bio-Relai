<section id="contenueVisiteurs">
    <header>
        <nav>
          <?php  //$menuInscription->afficherMenu();
          $menuAdherents->afficherMenu(); ?>
        </nav>
    </header>


    <section>
        <?php // echo $laListeProducteurs;

            echo "Bienvenue à vous adhérent ! Voici vos infos !";
            //var_dump($_SESSION['user']);
           $formulaireMonCompte->afficherFormulaire();
           $formulaireSupMonCompte->afficherFormulaire();
           
            ?>
    </section>
</section>
