

<section id="contenueResponsable">
    <header>
        <nav>
            <?php 
            $menuResponsable->afficherMenu();
            $menuFermerConnexion->afficherMenu();
            ?>

        </nav>
    </header>

    <section>
        <?php 
            echo "Bienvenu à vous Responsable ! ici vous gérez les producteurs !<br/>" ;
            echo "<br/> Voici les producteurs présents <br/>";
            // Faire un tableau d'infos modifiables 
           ?>

           <table>

            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>
           
            <?php 
            foreach($producteurs as $producteurs) {
                echo '<tr>';
                echo '<td>' . $producteurs->getNomUtilisateur() . '</td>';
                echo '<td>' . $producteurs->getPrenomUtilisateur() . '</td>';
                echo '<td>' . $producteurs->getMail() . '</td>';
                echo '<td> <a href="index.php?Responsable=ResponsableProducteurs&id='.$producteurs->getToken().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a href="index.php?Responsable=ResponsableProducteurs&id='.$producteurs->getToken().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                echo '</tr>';
            }
        
            ?>

            </table>


            <?php 
            $formulaireResponsable->afficherFormulaire();
            ?>

    </section>
</section>