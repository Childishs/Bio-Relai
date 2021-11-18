
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
                echo '<td> <i class="fas fa-user-edit"></i> </td>';
                echo '</tr>';
            }
        
            ?>

            </table>

            <?php 

           $formulaireVente->afficherFormulaire();

          ?>


    </section>
    