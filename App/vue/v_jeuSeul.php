<section>
    <img src="public/images/jeux/<?= $unJeu['image'] ?>" alt="Image du jeu" style="max-width: 300px">
    <h3>Toutes les infos sur <?= $unJeu['nom'] ?> :</h3>
    <p>Sur  <?= $unJeu['nom_console'] ?></p>
    <p>Description : <?= $unJeu['description'] ?></p>
    <p>Prix <?= $unJeu['prix'] ?>€</p>
</section>

<?php var_dump ($unJeu); ?>

