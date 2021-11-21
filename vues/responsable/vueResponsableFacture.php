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
            echo "<h1 class='title1'> Bienvenu à vous ". $_SESSION['user']['nom'].", </h1>" ;
            echo "<h3 class='title3'> ici vous gérez les factures. </h3><br/>";
            // Faire un tableau d'infos modifiables 
           ?>

        <table id="tableResp">

            <tr>
                <th>Numéro</th>
                <th>Libellé</th>
                <th>Nom</th>
                <th>Date</th>
            </tr>
           
           
            </table>



    </section>
</section>