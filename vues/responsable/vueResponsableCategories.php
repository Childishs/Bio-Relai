

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
            echo "Bienvenu à vous Responsable ! ici vous gérez les catégories !<br/>" ;
            echo "<br/> Voici les catégories présents <br/>";
            // Faire un tableau d'infos modifiables 
           ?>

           <table>

            <tr>
                <th>id</th>
                <th>Libellé</th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>
           
            <?php 
            foreach($categories as $categories) {
                echo '<tr>';
                echo '<td>' . $categories->getId() . '</td>';
                echo '<td>' . $categories->getNomCat() . '</td>';
                echo '<td> <i class="fas fa-trash"></i> </td>';
                echo '<td> <i class="fas fa-user-edit"></i> </td>';
                echo '</tr>';
            }
        
            ?>

            </table>

            <?php 

            $formulaireResponsable->afficherFormulaire();

            ?>

    </section>
</section>