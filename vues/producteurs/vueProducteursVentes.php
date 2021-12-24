<section id="'conteneuVisiteurs">
    <header>
        <nav>
            <?php $menuProducteur->afficherMenu(); ?>
        </nav>
    </header>

    <section>
        <?php
        echo "<h1 class='title1'> Bienvenue à vous ". $_SESSION['user']['nom'].", </h1>" ;
        echo "<h3 class='title3'> Gérez toutes vos ventes </h3><br/>";
     
        ?>

        <table id="tableResp">

            <tr>
                <th>Date Vente</th>
                <th>Produit</th>
                <th>Quantité</th>
                <th>Prix</th>
                <th>Modifier</th>
                <th>Supprimer</th>

            </tr>

            <?php
            foreach($infos as $infos) {
                echo '<tr>';
                $vente = VentesDAO::getOne($infos['idVente']);
                echo '<td>' . $vente->getDateVente() . '</td>';
                echo '<td>' . $infos['nomProduit'] . '</td>';
                echo '<td>' . $infos['quantite'] . '</td>';
                echo '<td>' . $infos['prix'] . '</td>';
                echo '<td> <a class="Intlink" href="index.php?Producteurs=Ventes&id='.$produits->getIdProduit().'&idVente='.$vente->getId().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a class="Intlink" href="index.php?Producteurs=Ventes&id='.$produits->getIdProduit().'&idVente='.$vente->getId().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
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