<section id="contenueResponsable">
    <header>
        <nav>
            <?php  var_dump($menu);// $menu->afficherMenu();
            // $menuConnexion->afficheMenu(); ?>

        </nav>
    </header>

    <section>
        <?php // echo $laListeProducteurs; 
       
            
            echo "Bienvenu à vous Responsable ! Voici vos infos !<br/>" ;
            echo "Votre magnfique nom de l'amour est :  " . $_SESSION['user']['nom'];
            ?>
    </section>
</section>