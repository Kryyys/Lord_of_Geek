<main>
    <div id="connexion">

        <fieldset>
            <h1>Inscription :</h1>
            <form method="POST" action="index.php?uc=administrer&action=inscriptionRealisee">
                <label for="nom">Nom :
                    <input type="text" name="nom" maxlength="100">
                </label>
                <label for="prenom">Prénom :
                    <input type="text" name="prenom" maxlength="100">
                </label>
                <label for="adresse">Adresse :
                    <input type="text" name="adresse" maxlength="100">
                </label>
            
                <label for="cp">Code Postal :
                    <input type="text" name="cp" maxlength="5">
                </label>
                <label for="ville">Ville :
                    <input type="text" name="ville" maxlength="100">
                </label>
                <label for="mail">Email :
                    <input type="text" name="mail" maxlength="100">
                </label>
                <label for="pseudonyme">Pseudonyme :
                    <input type="text" name="pseudo" maxlength="100">
                </label>
                <label for="motdepasse">Mot de Passe :
                    <input type="text" name="mdp">
                </label>
                <input type="submit" value="S'inscrire" name="S'inscrire">
            </form>
        </fieldset>

    </div>

</main>