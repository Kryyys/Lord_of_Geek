<?php

include_once "AccesDonnees.php";

/**
 * Requetes sur les commandes
 *
 * @author Loic LOG
 */
class M_Commande
{

    /**
     * Crée une commande
     *
     * Crée une commande à partir des arguments validés passés en paramètre, l'identifiant est
     * construit à partir du maximum existant ; crée les lignes de commandes dans la table contenir à partir du
     * tableau d'idProduit passé en paramètre
     * @param $nom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $listJeux

     */
    public static function creerCommande($listJeux, $id)
    {
        $sql = "INSERT INTO commandes(client_id) VALUES (:client_id)";
        $statement = AccesDonnees::prepare($sql);
        $statement->bindParam(":client_id", $id);
        $statement->execute();
        $idCommande = AccesDonnees::getPdo()->lastInsertId();
        foreach ($listJeux as $jeu) {
            $sql = "INSERT INTO lignes_commande(commande_id, exemplaire_id) VALUES ('$idCommande','$jeu')";
            $statement = AccesDonnees::exec($sql);
        }
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nom, $prenom, $adresse, $ville, $cp, $mail)
    {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($prenom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($adresse == "") {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if ($ville == "") {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if ($cp == "") {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }

    // public static function afficherCommande($id)
    // {
    //     $pdo = Accesdonnees::getPdo();
    //     $stmt = $pdo->prepare("SELECT exemplaires.*, commandes.*, client.*
    //     FROM client
    //     JOIN commandes ON commandes.client_id = client.id
    //     JOIN lignes_commande ON lignes_commande.commande_id = commandes.id
    //     JOIN exemplaires ON exemplaires.id = lignes_commande.exemplaire_id
    //     WHERE client.id = :clientId
    //     ORDER BY commandes.id DESC");
    //     $stmt->bindParam(":clientId", $id);
    //     $stmt->execute();
    //     $lesCommandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $lesCommandes;
    // }

    // * @param [type] $id_utilisateur
    // * @return $lesCommandes
    // */
    public static function afficherCommande($idClient)
    {
        try {
        $pdo = Accesdonnees::getPdo();
        $stmt = $pdo->prepare("SELECT exemplaires.nom, console.nom_console, exemplaires.prix, commandes.id
            FROM commandes
            JOIN lignes_commande ON lignes_commande.commande_id = commandes.id
            JOIN exemplaires ON exemplaires.id = lignes_commande.exemplaire_id
            JOIN console ON console.id = exemplaires.console_id
            WHERE client_id = :id_client
            ORDER BY commandes.id DESC");
        $stmt->bindParam(":id_client", $idClient);
        $stmt->execute();
        $lesCommandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $lesCommandes;
    } catch (\Throwable $th) {
        var_dump($th);
    }
    return true;
    }
}
