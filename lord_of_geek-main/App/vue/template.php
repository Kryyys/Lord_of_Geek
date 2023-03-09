<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="public/cssGeneral.css" rel="stylesheet" type="text/css">
    <title>LoG</title>
</head>

<body>
    <header>
        <!-- Images En-tête -->
        <img src="public/images/logo.png" alt="Logo Lord Of Geek" />
        <!--  Menu haut-->
        <nav id="menu">
            <ul>
                <li><a href="index.php?uc=accueil"> Accueil </a></li>
                <li><a href="index.php?uc=visite&action=voirJeux"> Voir le catalogue de jeux </a></li>
                <li><a href="index.php?uc=panier&action=voirPanier"> Voir son panier </a></li>

                <?php if (!isset($_SESSION['id'])) { ?>
                    <li><a href="index.php?uc=connexion"> Connexion </a></li>
                <?php } else { ?>
                    <li><a href="index.php?uc=administrer&action=compte"> Mon compte </a></li>
                    <li><a href="index.php?uc=administrer&action=deconnexion"> Déconnexion </a></li>
                <?php } ?>

            </ul>
        </nav>

    </header>
    <main>
        <?php
        // Controleur de vues
        // Selon le cas d'utilisation, j'inclus un controleur ou simplement une vue
        switch ($uc) {
            case 'accueil':
                include 'App/vue/v_accueil.php';
                break;
            case 'visite':
                include("App/vue/v_jeux.php");
                break;
            case 'panier':
                include("App/vue/v_panier.php");
                break;
            case 'commander':
                include("App/vue/v_commande.php");
                break;
            case 'administrer':
                include("App/vue/v_compte.php");
                break;
            case 'connexion':
                include("App/vue/v_connexion.php");
                break;
            case 'inscription':
                include("App/vue/v_inscription.php");
                break;
            case 'jeu':
                include("App/vue/v_jeuSeul.php");
                break;
            case 'categorie':
                include("App/vue/v_categorie.php");
                break;
            case 'console':
                include("App/vue/v_console.php");
                break;
            case 'tag':
                include("App/vue/v_tag.php");
                break;
            default:
                break;
        }
        ?>
    </main>
</body>

</html>