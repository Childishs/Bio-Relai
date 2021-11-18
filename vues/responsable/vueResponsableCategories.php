

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
                echo '<td> <a href="index.php?Responsable=ResponsableCategories&id='.$categories->getId().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a href="index.php?Responsable=ResponsableCategories&id='.$categories->getId().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                echo '</tr>';
            }
            ?>

            </table>

            <?php 
           // echo "<h1 id='formTitle'> Créer une catégorie </h1>";
            $formulaireResponsable->afficherFormulaire();

            ?>

    </section>
</section>