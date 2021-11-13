

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
            echo "Bienvenu à vous Responsable ! ici vous gérez les producteurs !<br/>" ;
            
            // Faire un tableau d'infos modifiables 
            var_dump($producteurs);
         
            ?>
    </section>
</section>