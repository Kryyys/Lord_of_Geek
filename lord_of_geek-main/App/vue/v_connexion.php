<main id="connexion">
    <div>

        <h1>Connexion</h1>

        <form action="index.php?uc=administrer&action=verifConnexion" method="POST">

            <label for="pseudo">Pseudonyme :
                <input type="text" name="pseudo" id="pseudo">
            </label>

            <label for="motdepasse">Mot de Passe :
                <input type="text" name="mdp" id="mdp">
            </label>

            <input type="submit" value="Se Connecter" name="Se Connecter">

        </form>

    </div>

    <span><a href="index.php?uc=inscription">Pas de compte ? Inscrivez-vous !</a></span>


</main>