<section id="creationCommande">
    
    <?php if (!isset($_SESSION['id'])) {  ?>

    <form method="POST" action="index.php?uc=commander&action=confirmerCommande">
        <ul>
            <li>Pseudo : <?= $_SESSION['pseudo'] ?></li>
            <li>Nom : <?= $client['nom'] ?></li>
            <li>Prenom : <?= $client['prenom'] ?></li>
            <li>Adresse : <?= $client['adresse'] ?></li>
            <li>Ville : <?= $client['cp'] . "  " . $client['ville'] ?></li>
            <li>Mail : <?= $client['mail'] ?></li>
        </ul>

        <br>

        <p>Est-ce bien vos coordonnées ? </p>

        <input type="submit" value="Confirmer le commande" name="Confirmer la commande">
        <br>
        <p><a href="index.php?uc=administrer&action=compte">Non, je souhaite modifier mes coordonnées.</a></p>
    </form>
</section>

<?php
    }
