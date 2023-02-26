<section id="visite">
    <aside id="categories">

    <ul>
        <li>    <a href="index.php?uc=visite&action=ordreAlpha">Trier par ordre Alphabétique</a></li>
        <li>    <a href="index.php?uc=visite&action=prixCroissant">Trier par prix croissant</a></li>
        <li>    <a href="index.php?uc=visite&action=prixDecroissant">Trier par prix décroissant</a></li>
    </ul>
        <ul>
            <?php
            foreach ($lesCategories as $uneCategorie) {
                $idCategorie = $uneCategorie['id'];
                $libCategorie = $uneCategorie['nom'];
            ?>
                <li>
                    <a href=index.php?uc=visite&categorie=<?php echo $idCategorie ?>&action=voirCategorie><?php echo $libCategorie ?></a>
                </li>
            <?php
            }
            ?>
        </ul>

        <ul>
            <?php
            foreach ($lesConsoles as $uneConsole) {
                $idConsole = $uneConsole['id'];
                $libConsole = $uneConsole['nom_console'];
            ?>
                <li>
                    <a href=index.php?uc=visite&console=<?php echo $idConsole ?>&action=voirConsole><?php echo $libConsole ?></a>
                </li>
            <?php
            }
            ?>
        </ul>

        <ul>
            <?php
            foreach ($lesTags as $unTag) {
                $idTag = $unTag['id'];
                $libTag = $unTag['nom_tag'];
            ?>
                <li>
                    <a href=index.php?uc=visite&console=<?php echo $idTag ?>&action=voirConsole><?php echo $libTag ?></a>
                </li>
            <?php
            }
            ?>
        </ul>
    </aside>

    <section id="jeux">

        <?php
        foreach ($lesJeux as $unJeu) {
            $id = $unJeu['id'];
            $nom = $unJeu['nom'];
            $etat = $unJeu['etat_jeu'];
            $categorie = $unJeu['categorie_id'];
            // $description = $unJeu['description'];
            $prix = $unJeu['prix'];
            $image = $unJeu['image'];
        ?>
            <article>
                <img src="public/images/jeux/<?= $image ?>" alt="Image de <?= $nom; ?>" />
                <p><?= $nom ?></p>
                <p><?= $etat ?></p>
                <p><?= "Prix : " . $prix . " Euros" ?>
                <br>
                <a href="index.php?uc=jeu&action=consulter&id= <?= $id ?>" title="Voir le jeu">Voir le jeu </a>
                <a href="index.php?uc=visite&categorie=<?= $categorie ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                    <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add" />
                </a>
                </p>
            </article>
        <?php
        }
        ?>
    </section>
</section>