<?php

include_once "AccesDonnees.php";

class Session
{

    /**
     * Vérifie si un client existe dans la bdd
     *
     * @param $pseudo : string
     * @param $mdp : string
     * @return un booléen
     */

    public static function client_existe(string $pseudo, string $mdp)
    {

        $sql = 'SELECT 1 FROM client ';
        $sql .= 'WHERE pseudo = :pseudo AND mdp = :mdp';

        $statement = AccesDonnees::prepare($sql);
        $statement->bindParam(":pseudo", $pseudo);
        $statement->bindParam(":mdp", $mdp);
        $statement->execute();

        if ($statement->rowCount() > 0) {
            $existe = true;
        } else {
            $existe = false;
        }
        var_dump($existe);
        die;
        return (bool) $existe;
    }



    /**
     * Vérifie si le mdp correspond bien à celui du client dans la bdd
     *
     * @param $pseudo : string
     * @param $mdp : string
     * @return un booléen
     */

    public static function checkPassword(string $pseudo, string $mdp)
    {
        $existe=false;

        $sql = "SELECT id, pseudo, mdp FROM client WHERE pseudo = :pseudo";

        $statement = AccesDonnees::prepare($sql);
        $statement->bindParam(":pseudo", $pseudo);

        $statement->execute();

        if ($statement->rowCount() > 0) {
            $data = $statement->fetch();
            $mdp_bdd = $data['mdp'];
        }
        if ($statement->rowCount() == 0) {
            afficheErreur("Pseudo ou mot de passe inconnu");
            die;
        }

        if (password_verify($mdp, $mdp_bdd)) {
            $id = $data['id'];
            $_SESSION["id"] = $id;
            $_SESSION["pseudo"] = $data['pseudo'];
            $existe=true;
            // return $id_utilisateur;
        }
        return $existe;
    }


    /**
     * Insère un le pseudo et le mdp d'un client dans la bdd
     *
     * @param $pseudo : string
     * @param $mdp : string
     * @return un booléen
     */

    public function register(string $pseudo, string $mdp): bool
    {
        $sql = "INSERT INTO client (identifiant, mot_de_passe) VALUES (:pseudo,:psw);";
        $statement = AccesDonnees::prepare($sql);
        $mdp = password_hash($mdp, PASSWORD_BCRYPT);

        $statement->bindParam(":pseudo", $pseudo);
        $statement->bindParam(":mdp", $mdp);

        $statement->execute();
        return true;
    }

    // public static function getInfos(int $id) 
    // {

    //     $sql = "SELECT * FROM client (nom, prenom, adresse, cp, ville, mail) 
    //     WHERE id = :id";

    //     $statement = AccesDonnees::prepare($sql);
    //     $statement->bindParam(":id", $id, PDO::PARAM_INT);
    //     $statement->execute();

    //     $data = $statement->fetch();
    //     $_SESSION["nom"] = $data['nom'];
    //     $_SESSION["prenom"] = $data['prenom'];
    //     $_SESSION["adresse"] = $data['adresse'];
    //     $_SESSION["cp"] = $data['cp'];
    //     $_SESSION["ville"] = $data['ville'];
    //     $_SESSION["mail"] = $data['mail'];

    // }


    /**
     * Récupère les infos d'un client en fonction de l'id enregistré dans la session
     *
     * @param $id : int
     * @return un tableau 
     */

    public static function getInfos(int $id)
    {
        $pdo = AccesDonnees::getPdo();
        $statement = $pdo->prepare("SELECT * FROM client WHERE id = :id");
        $statement->bindParam(":id", $id);
        $statement->execute();
        $client = $statement->fetch(PDO::FETCH_ASSOC);
        return $client;
    }


    /**
     * Modifie les informations d'un client déjà enregistré dans la bdd
     *
     * @param $nom : string
     * @param $prenom : string
     * @param $rue : string
     * @param $cp : string
     * @param $ville : string
     * @param $mail : string
     * @param $pseudo : string
     * @param $mdp : string
     */
    public static function modifInfos(string $nom, string $prenom, string $adresse, string $cp, string $ville, string $mail, string $pseudo, string $id)
    {
        $sql = "UPDATE client 
        SET nom=:nom, prenom=:prenom, adresse=:adresse, cp=:cp, ville=:ville, mail=:mail, pseudo=:pseudo
        WHERE id = :id";

            $statement = AccesDonnees::prepare($sql);
            $statement->bindParam(':id', $id, PDO::PARAM_STR);
            $statement->bindParam(':nom', $nom, PDO::PARAM_STR);
            $statement->bindParam(':prenom', $prenom, PDO::PARAM_STR);
            $statement->bindParam(':adresse', $adresse, PDO::PARAM_STR);
            $statement->bindParam(':cp', $cp, PDO::PARAM_STR);
            $statement->bindParam(':ville', $ville, PDO::PARAM_STR);
            $statement->bindParam(':mail', $mail, PDO::PARAM_STR);
            $statement->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
            $statement->execute();
    }
}


