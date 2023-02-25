<?php

include 'App/modele/M_commande.php';
include 'App/modele/M_Session.php';

/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande':
        $n = nbJeuxDuPanier();
        if ($n > 0) {
            $client = Session::getInfos($_SESSION['id']);
        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
    case 'confirmerCommande':
        // $nom = filter_input(INPUT_POST, 'nom');
        // $prenom = filter_input(INPUT_POST, 'prenom');
        // $adresse = filter_input(INPUT_POST, 'adresse');
        // $ville = filter_input(INPUT_POST, 'ville');
        // $cp = filter_input(INPUT_POST, 'cp');
        // $mail = filter_input(INPUT_POST, 'mail');
        // $errors = M_Commande::estValide($nom, $prenom, $adresse, $ville, $cp, $mail);
        // if (count($errors) > 0) {
        //     Si une erreur, on recommence
        //     afficheErreurs($errors);
        // } else {

        $lesIdJeu = getLesIdJeuxDuPanier();
        M_Commande::creerCommande($lesIdJeu, $sessionClient);
        supprimerPanier();
        afficheMessage("Commande enregistrée");
        $uc = '';
        // }
        break;
}
