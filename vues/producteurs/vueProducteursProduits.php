<section id="'conteneuVisiteurs">
    <header>
        <nav>
            <?php $menuProducteur->afficherMenu(); ?>
        </nav>
    </header>

    <section>

        <?php // echo $laListeProducteurs;
        echo "Voici vos Produits ! </br>";
        echo "</br>N'hésitez pas à en ajouter des nouveaux !</br>";

        $listeProduits->afficherListe();
        ?>



       <br>
       <br>

        <form>
        <a href="vues/producteurs/vueProducteursUnProduit.php">
            <input type="button" value="Ajouter un Produit">
            <?php
            $_SESSION=['produit']['ajouter'];
            ?>
        </a>
        </form>

        <form>
            <a href="vues/producteurs/vueProducteursUnProduit.php">
                <input type="button" value="Modifier un Produit">
                <?php
                $_SESSION=['produit']['modif'];
                ?>
            </a>
        </form>









    </section>
</section>
