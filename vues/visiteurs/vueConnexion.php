<section id="conteneuVisiteurs">
    <header>
        <nav>
            <?php $menuConnexion->afficherMenu(); ?>

        </nav>
    </header>
        <?php 
        
            $formulaireConnexion->afficherFormulaire();       
            $menuInscription->afficherMenu();
            $menuFermerConnexion->afficherMenu();
        
        ?>
        
    </section>