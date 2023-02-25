<section>
    <img src="public/images/panier.gif"	alt="Panier" title="panier"/>
    <?php
    foreach ($lesJeuxDuPanier as $unJeu) {
        $id = $unJeu['id'];
        $nom = $unJeu['nom'];
        $description = $unJeu['description'];
        $image = $unJeu['image'];
        $prix = $unJeu['prix'];
        ?>
        <p>
            <img src="public/images/jeux/<?php echo $image ?>" alt=image width=100 height=100 />
            <a href="">
                <?php
                echo $nom . "($prix Euros)";
                ?>
            </a>
            <br>
            <a href="index.php?uc=visite&action=consulter&id= <?= $id ?>" title="Voir le jeu">Voir le jeu </a>
            <br>
            <a href="index.php?uc=panier&jeu=<?php echo $id ?>&action=supprimerUnJeu" onclick="return confirm('Voulez-vous vraiment retirer ce jeu ?');">
                <img src="public/images/retirerpanier.png" TITLE="Retirer du panier" >
            </a>
        </p>
        <?php
    }
    ?>
    <br>
    <a href=index.php?uc=commander&action=passerCommande>
        <img src="public/images/commander.jpg" title="Passer commande" >
    </a>
</section>
