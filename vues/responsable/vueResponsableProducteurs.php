

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
            echo "<h3 class='title3'> ici vous gérez les producteurs. </h3><br/>";
            // Faire un tableau d'infos modifiables 
           ?>

            <h1 id="formTitle"> CONSULTER LES PRODUCTEURS </h1>
                <table id="tableResp">

                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Adresse</th>
                    <th>Commune</th>
                    <th>Code Postale</th>
                    <th>Descriptif </th>
                    <th>Photo du producteur </th>
                    <th>Supprimer</th>
                    <th>Modifier</th>
                </tr>
            
                <?php 
                foreach($producteurs as $producteurs) {
                    echo '<tr>';
                    echo '<td>' . $producteurs->getNomUtilisateur() . '</td>';
                    echo '<td>' . $producteurs->getPrenomUtilisateur() . '</td>';
                    echo '<td>' . $producteurs->getMail() . '</td>';
                    echo '<td>' . $producteurs->getAdresseProducteur() . '</td>';
                    echo '<td>' . $producteurs->getCommuneProducteur() . '</td>';
                    echo '<td>' . $producteurs->getCodePostalProducteur() . '</td>';
                    echo '<td>' . $producteurs->getDescriptifProducteur() . '</td>';
                    echo '<td> <img src="' . $producteurs->getPhotoProducteur() . '" width=100 height=100></td>';
                    echo '<td> <a href="index.php?Responsable=ResponsableProducteurs&id='.$producteurs->getToken().'&action=delete"> <i class="fas fa-trash"></i> </a></td>';
                    echo '<td> <a href="index.php?Responsable=ResponsableProducteurs&id='.$producteurs->getToken().'&action=toUpdate"> <i class="fas fa-user-edit"></i> </a></td>';
                    echo '</tr>';
                }
            
                ?>

                </table>

                <div class="container">
            <?php 
            $formulaireResponsable->afficherFormulaire();
            ?>
                </div>
            <script>
                let champ = document.getElementById("id");
                champ.hidden = true;
            </script>

    </section>
</section>