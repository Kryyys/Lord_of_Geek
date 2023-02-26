<?php
include 'App/modele/M_categorie.php';
include 'App/modele/M_exemplaire.php';
include 'App/modele/M_Console.php';
include 'App/modele/M_Tag.php';

/**
 * Controleur pour la consultation des exemplaires
 * @author Loic LOG
 */
switch ($action) {
    case 'voirJeux' :
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $lesJeux = M_Exemplaire::trouveLesJeux($idJeu);
        break;
    case 'voirCategorie' :
        $categorie = filter_input(INPUT_GET, 'categorie');
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    case 'voirConsole' :
        $console = filter_input(INPUT_GET, 'console');
        $lesJeux = M_Exemplaire::trouveLesJeuxdeConsole($console);
        break;
    case 'voirTag' :
        $tag = filter_input(INPUT_GET, 'tag');
        $lesJeux = M_Exemplaire::trouveLesJeuxdeConsole($tag);
        break;
    case 'ajouterAuPanier' :
        $idJeu = filter_input(INPUT_GET, 'jeu');
        $categorie = filter_input(INPUT_GET, 'categorie');
        if (!ajouterAuPanier($idJeu)) {
            afficheErreurs(["Ce jeu est déjà dans le panier !!"]);
        } else {
            afficheMessage("Ce jeu a été ajouté");
        }
        $lesJeux = M_Exemplaire::trouveLesJeuxDeCategorie($categorie);
        break;
    case 'rechercherJeux' : 
        $jeu = filter_input(INPUT_GET, 'keywords');
        $lesJeux = M_Exemplaire::rechercherJeux($jeu);
        break;
    case 'consulterJeu':
        $idJeu = filter_input(INPUT_GET, 'id');
        $unJeu = M_Exemplaire::trouveUnJeu($idJeu);
        break;
    case 'ordreAlpha' :
        $nomAlpha = filter_input(INPUT_GET, 'nom');
        $lesJeux = M_Exemplaire::trierAlpha(($nomAlpha));
        break;
    case 'prixCroissant' :
        $prixCroissant = filter_input(INPUT_GET, 'prix');
        $lesJeux = M_Exemplaire::trierPrixCroissant(($prixCroissant));
        break;
    case 'prixDecroissant' :
        $prixDecroissant = filter_input(INPUT_GET, 'prix');
        $lesJeux = M_Exemplaire::trierPrixDecroissant(($prixDecroissant));
        break;

    default:
        $lesJeux = [];
        break;
}

$lesCategories = M_Categorie::trouveLesCategories();
$lesConsoles = M_Console::trouveLesConsoles();
$lesTags = M_Tag::trouveLesTags();
