<section id="'conteneuVisiteurs">
    <header>
        <nav>
            <?php $menuProducteur->afficherMenu(); ?>
        </nav>
    </header>

    <section>
        <?php
        echo "<h1 class='title1'> Bienvenu à vous ". $_SESSION['user']['nom'].", </h1>" ;
        echo "<h3 class='title3'> Gérez tous vos produits ! </h3><br/>";
        ?>

        <table id="tableResp">

            <tr>
                <th>id</th>
                <th>Libellé</th>
                <th>Supprimer</th>
                <th>Modifier</th>
            </tr>

            <?php
            foreach($produits as $produits) {
                echo '<tr>';
                echo '<td>' . $produits->getIdProduit() . '</td>';
                echo '<td>' . $produits->getNomProduit() . '</td>';
                echo '<td> <a class="Intlink" href="index.php?Producteurs=Produits&id='.$produits->getIdProduit().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a class="Intlink" href="index.php?Producteurs=Produits&id='.$produits->getIdProduit().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                echo '</tr>';
            }
            ?>

        </table>

        <div class="container">
            <?php
            // echo "<h1 id='formTitle'> Créer une catégorie </h1>";
            $formulaireProducteur->afficherFormulaire();

            ?>
        </div>

    </section>
</section>