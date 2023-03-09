<main>
    <h1>Espace client</h1>
    <fieldset>
        <h2>Informations personnelles :</h2>
        <ul>
            <li>Pseudo : <?= $_SESSION['pseudo'] ?></li>
            <li>Nom : <?= $client['nom'] ?></li>
            <li>Prenom : <?= $client['prenom'] ?></li>
            <li>Adresse : <?= $client['adresse'] ?></li>
            <li>Ville : <?= $client['cp'] . "  " . $client['ville'] ?></li>
            <li>Mail : <?= $client['mail'] ?></li>
        </ul>
    </fieldset>

    <br><br>

    <fieldset>
        <form method="POST" action="index.php?uc=administrer&action=modifInfos">
            <h2>Modifier les informations de votre compte</h2>

            <ul>
                <div>
                    <label for="nom">Nom</label>
                    <input id="nom" type="text" name="nom" value="<?= $client['nom'] ?>" maxlength="100">
                </div>
                <br>
                <div>
                    <label for="prenom">Prénom</label>
                    <input id="prenom" type="text" name="prenom" value="<?= $client['prenom'] ?>" maxlength="100">
                </div>
                <br>
                <div>
                    <label for="adresse">Adresse</label>
                    <input id="adresse" type="text" name="adresse" value="<?= $client['adresse'] ?>" maxlength="100">
                </div>
                <br>
                <div>
                    <label for="cp">Code postal</label>
                    <input id="cp" type="text" name="cp" value="<?= $client['cp'] ?>" size="5" maxlength="5">
                </div>
                <br>
                <div>
                    <label for="ville">Ville</label>
                    <input id="ville" type="text" name="ville" value="<?= $client['ville'] ?>" maxlength="100">
                </div>
                <br>
                <div>
                    <label for="mail">Mail </label>
                    <input id="mail" type="text" name="mail" value="<?= $client['mail'] ?>">
                </div>
                <br>
                <div>
                    <label for="pseudo">Pseudo </label>
                    <input id="pseudo" type="text" name="pseudo" value="<?= $_SESSION['pseudo'] ?>" maxlength="100">
                </div>
                <br>
                <div>
                    <input type="submit" value="Modifier" name="Valider">
                    <br>
                    <input type="reset" value="Annuler" name="Annuler" class="reset">
                </div>
            </ul>
        </form>
    </fieldset>

    <br>

    <fieldset>
        <h2>Commandes passées :</h2>
        <table class="table_commandes">
            <thead>
                <tr>
                    <th>Numéro de commande</th>
                    <th>Jeu</th>
                    <th>Console</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($commandesClient as $unJeu) :
                    echo "<tr>";
                    echo "<td>" . $unJeu['id'] . "</tb>";
                    echo "<td>" . $unJeu['nom'] . "</tb>";
                    echo "<td>" . $unJeu['nom_console'] . "</tb>";
                    echo "<td>" . $unJeu['prix'] . "</tb>";
                    echo "</tr>";
                ?>
                <?php endforeach; ?>

            </tbody>
        </table>
    </fieldset>

    <br>
    <br>
    <br>



</main>