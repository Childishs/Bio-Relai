
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
            echo "Bienvenu à vous Responsable ! ici vous gérez les ventes !<br/>" ;
            echo "<br/> Voici les ventes présentes <br/>";
            // Faire un tableau d'infos modifiables 
           ?>

           <table>

            <tr>
                <th>Numéro</th>
                <th>Libellé</th>
                <th>Nom</th>
                <th>Date</th>
            </tr>
           
           
            </table>



    </section>
</section><section id="contenueResponsable">
<header>
    <nav>
        <?php 
        $menuResponsable->afficherMenu();
        ?>

    </nav>
</header>

<section>
    <?php 
        echo "Bienvenu à vous Responsable ! ici vous gérez les factures !<br/>" ;
        echo "<br/> Voici les factures présentes <br/>";
        // Faire un tableau d'infos modifiables 
       ?>

       <table>

        <tr>
            <th>Numéro</th>
            <th>Libellé</th>
            <th>Nom</th>
            <th>Date</th>
        </tr>
       
       
        </table>



</section>
</section>