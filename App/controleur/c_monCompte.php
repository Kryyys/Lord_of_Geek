<?php

include 'App/modele/M_Inscription.php';
include 'App/modele/M_Session.php';
include 'App/modele/M_Commande.php';

/**
 * Controleur pour la gestion du compte
 * @author BECKER Marine
 */

switch ($action) {
    case 'inscriptionRealisee':

        $inscription = filter_input(INPUT_GET, 'inscription');
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $adresse = filter_input(INPUT_POST, 'adresse');
        $cp = filter_input(INPUT_POST, 'cp');
        $ville = filter_input(INPUT_POST, 'ville');
        $mail = filter_input(INPUT_POST, 'mail');
        $pseudo = filter_input(INPUT_POST, 'pseudo');
        $mdp = filter_input(INPUT_POST, 'mdp');

        // $errors = Session::estValideInscription($nom, $prenom, $pseudo, $psw, $rue, $ville, $cp, $mail);

        if (estRempli($nom, $prenom, $adresse, $ville, $cp, $mail, $pseudo, $mdp)) {
            M_Inscription::creerProfil($nom, $prenom, $adresse, $cp, $ville, $mail, $pseudo, $mdp);
            afficheMessage('Félicitations, vous êtes maintenants inscrits sur Lord of Geek ! Veuillez maintenant 
            <a href="index.php?uc=compte">vous connecter</a> !');
        } else {
            afficheMessage("Ce n'est pas valide");
        }
        break;

    case 'connexion':
        $mySession = new Session();

        $message = '';
        $connexion = filter_input(INPUT_GET, 'connexion');

        if ($connexion == "Connexion") {
            $pseudo = filter_input(INPUT_POST, 'pseudo');
            $mdp = filter_input(INPUT_POST, 'mdp');

            $_SESSION['id'] = $mySession->checkPassword($pseudo, $mdp);
            if ($_SESSION['id']) {
                header('Location: index.php?uc=compte');
            }

            // $pseudo = filter_input(INPUT_POST, 'pseudo');
            // $mdp = filter_input(INPUT_POST, 'mdp');
            // $client = Session::checkPassword($pseudo, $mdp);

            // if (!$client) {
            //     afficheMessage("Pseudo ou mot de passe inconnus");
            // } else {
            //     $_SESSION['id'] = $client;
            //     header('Location: index.php?uc=accueil&action=voirJeux');
            // }

        }
        break;

    case 'verifConnexion':
        // trim : supprime les caractères blanc (espaces, entrée etc...)
        $pseudo = trim(filter_input(INPUT_POST, "pseudo"));
        $mdp = trim(filter_input(INPUT_POST, "mdp"));

        // if (is_existe($pseudo) && is_existe($mdp)) {
        if (Session::checkPassword($pseudo, $mdp)) {
            $mySession = new Session();
            // $mySession->register($pseudo,$mdp);

            // TERNAIRE ELLE REMPLACE UN IF 
            // if($mySession->register($pseudo,$mdp)) {
            //     echo "operation réussie";
            // } else {
            //     echo "erreur";
            // }
            header('Location:index.php?uc=accueil');
        } else {
            header('Location:index.php?uc=connexion');
        }
        break;

    case 'deconnexion':
        session_destroy();
        header('Location:index.php?uc=accueil"');
        exit;
        break;

    case 'compte' :
        $client = Session::getInfos($_SESSION['id']);
        break;

    case 'modifInfos' :

        //UN GET ???
        $nom = filter_input(INPUT_POST, 'nom');
        $prenom = filter_input(INPUT_POST, 'prenom');
        $adresse = filter_input(INPUT_POST, 'adresse');
        $cp = filter_input(INPUT_POST, 'cp');
        $ville = filter_input(INPUT_POST, 'ville');
        $mail = filter_input(INPUT_POST, 'mail');
        $pseudo = filter_input(INPUT_POST, 'pseudo');

        Session::modifInfos ($nom, $prenom, $adresse, $cp, $ville, $mail, $pseudo, $_SESSION['id']);

        header("Location: index.php?uc=administrer&action=compte");
        die();

        break;




}


        // $commandesClient = [];

        // $commandesClient = M_Commande::afficherCommande($_SESSION['id']);
        if (!empty($_SESSION['id'])) {
            $commandesClient = M_Commande::afficherCommande($_SESSION['id']);
        }