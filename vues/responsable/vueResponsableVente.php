
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
            echo "<h3 class='title3'> ici vous gérez les ventes. </h3><br/>";
            // Faire un tableau d'infos modifiables 
           ?>

            <table id="tableResp">

            <tr>
                <th>Numéro</th>
                <th>Date de début producteur </th>
                <th>Date de fin producteur </th>
                <th>Date de début achat</th>
                <th>Date de fin des achats </th>
                <th> Etat de la mise en production (indépendamment des dates) </th>
                <th> Etat de la mise en place des achats (indépendamment des dates) </th>
                <th>Supprimer </th>
                <th>Modifier </th>
            </tr>

           
            <?php 
            foreach($ventes as $ventes) {

                echo '<tr>';
                echo '<td>' . $ventes->getId() . '</td>';
                echo '<td>' . $ventes->getDateDebutProd() . '</td>';
                echo '<td>' . $ventes->getDateFinProd() . '</td>';
                echo '<td>' . $ventes->getDateVente() . '</td>';
                echo '<td>' . $ventes->getDateFinCli() . '</td>';
                echo '<td>' . $ventes->getEtatProd() . '</td>';
                echo '<td>' . $ventes->getEtatAchat() . '</td>';
                echo '<td> <a href="index.php?Responsable=ResponsableVente&id='.$ventes->getId().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a href="index.php?Responsable=ResponsableVente&id='.$ventes->getId().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                echo '</tr>';
            }

            ?>

            </table>

            <div class="container">
            <?php 

           $formulaireVente->afficherFormulaire();

          ?>
            </div>

            <script>
                let champ = document.getElementById("id");
                champ.hidden = true;
            </script>

    </section>
    