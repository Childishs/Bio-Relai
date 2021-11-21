

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
            echo "<h3 class='title3'> ici vous gérez les catégories. </h3><br/>";
            // Faire un tableau d'infos modifiables 
           ?>

           <table id="tableResp">

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
                echo '<td> <a class="Intlink" href="index.php?Responsable=ResponsableCategories&id='.$categories->getId().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a class="Intlink" href="index.php?Responsable=ResponsableCategories&id='.$categories->getId().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                echo '</tr>';
            }
            ?>

            </table>

            <div class="container">
            <?php 
           // echo "<h1 id='formTitle'> Créer une catégorie </h1>";
            $formulaireResponsable->afficherFormulaire();

            ?>
            </div>

    </section>
</section>