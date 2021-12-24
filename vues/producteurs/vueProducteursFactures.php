<section id="'conteneuVisiteurs">
    <header>
        <nav>
            <?php $menuProducteur->afficherMenu(); ?>
        </nav>
    </header>

    <section>
        <?php // echo $laListeProducteurs;
        echo "Voici vos factures !" ?>
        <h3>Ventes à venir :</h3>
        <table id="tableResp">

            <tr>
                <th>Date Vente</th>
                <th>Produits</th>
                <th>Quantité</th>
                <th>Prix</th>

            </tr>

            <?php

            foreach($commandes as $commandes) {
                echo '<tr>';
                echo '<td>' . $commandes->getDateCommande() . '</td>';
                echo '<td>' . $commandes->getNomProduit() . '</td>';
                echo '<td> <a class="Intlink" href="index.php?Producteurs=Produits&id='.$commandes->getIdCommande().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                echo '<td> <a class="Intlink" href="index.php?Producteurs=Produits&id='.$commandes->getIdCommande().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                echo '</tr>';
            }
            ?>

        </table>
    </section>
</section>
