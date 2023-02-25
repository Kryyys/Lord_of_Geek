<?php

/**
 * Classe pour les inscriptions
 *
 * @author BECKER Marine
 * 
 */

class M_Inscription
{


    /**
     * Crée un profil utilisateur
     *
     * Crée une un profil utilisateur à partir des arguments validés passés en paramètre 
     * @param $nom
     * @param $prenom
     * @param $rue
     * @param $cp
     * @param $ville
     * @param $mail
     * @param $pseudo
     * @param @mdp
     */

    public static function creerProfil($nom, $prenom, $adresse, $cp, $ville, $mail, $pseudo, $mdp)
    {
        try {
            $sql = "INSERT INTO client (nom, prenom, adresse, cp, ville, mail, pseudo, mdp) 
            VALUES (:nom, :prenom, :adresse, :cp, :ville, :mail, :pseudo, :mdp)";

            $mdp = password_hash($mdp, PASSWORD_BCRYPT);

            $statement = AccesDonnees::prepare($sql);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $statement->bindParam(':cp', $cp, PDO::PARAM_STR);
            $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
            $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $statement->bindParam(':mdp', $mdp, PDO::PARAM_STR);
            $statement->execute();
        } catch (PDOException $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }

    // public function register(string $pseudo, string $mdp): bool
    // {
    //     $sql = "INSERT INTO client (pseudo, mdp) VALUES (:pseudo,:mdp);";
    //     $statement = AccesDonnees::prepare($sql);
    //     $mdp = password_hash($mdp, PASSWORD_BCRYPT);

    //     $statement->bindParam(":pseudo", $pseudo);
    //     $statement->bindParam(":mdp", $mdp);

    //     $statement->execute();
    //     return true;
    // }

    
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
    public static function estValide($nom, $rue, $ville, $cp, $mail) {
        $erreurs = [];
        if (!empty($nom)) {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if (!empty($rue)) {
            $erreurs[] = "Il faut saisir le champ rue";
        }
        if (!empty($ville)) {
            $erreurs[] = "Il faut saisir le champ ville";
        }
        if (!empty($cp)) {
            $erreurs[] = "Il faut saisir le champ Code postal";
        } else if (!estUnCp($cp)) {
            $erreurs[] = "erreur de code postal";
        }
        if (!empty($mail)) {
            $erreurs[] = "Il faut saisir le champ mail";
        } else if (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }
        return $erreurs;
    }

}


