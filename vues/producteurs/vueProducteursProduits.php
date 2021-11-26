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
        ?>



       <br>
       <br>

        <form>
        <a href="vues/producteurs/vueProducteursUnProduit.php">
            <input type="button" value="Ajouter un Produit">
            <?php
            $_SESSION=['user']['ajoutProduit'];
            ?>
        </a>
        </form>

        <form>
            <a href="vues/producteurs/vueProducteursUnProduit.php">
                <input type="button" value="Modifier un Produit">
                <?php
                $_SESSION=['user']['modifProduit'];
                ?>
            </a>
        </form>


    </section>
</section>
