<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire
{

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux d
     * 
     * @param $idJeux
     * @return un tableau associatif
     */
    public static function trouveLesJeux($idJeux)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

        /**
     * Trie les jeux par ordre alphabétique
     * 
     * @param $nomAlpha string
     * @return un tableau associatif
     */
    public static function trierAlpha($nomAlpha)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id ORDER BY nom";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

            /**
     * Trie les jeux par ordre de prix croissant
     * 
     * @param $prixCroissant string
     * @return un tableau associatif
     */
    public static function trierPrixCroissant($prixCroissant)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id ORDER BY prix";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

            /**
     * Trie les jeux par ordre de prix décroissant
     * 
     * @param $prixDecroissant string
     * @return un tableau associatif
     */
    public static function trierPrixDecroissant($prixDecroissant)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id ORDER BY prix DESC";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie int
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id WHERE categorie_id = '$idCategorie'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * console passée en argument
     *
     * @param $idConsole
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeConsole($idConsole)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id WHERE console_id = '$idConsole'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne sous forme d'un tableau associatif tous les tags associés
     * à un jeu passés en argument
     *
     * @param $idTag
     * @return un tableau associatif
     */
    public static function trouveLesJeuxdeTag($idTag)
    {
        $req = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id WHERE tag_id = '$idTag'";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }


    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux)
    {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                $req = "SELECT * FROM exemplaires WHERE id = '$unIdProduit'";
                $res = AccesDonnees::query($req);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param 
     * @return un tableau associatif
     */
    public static function rechercherJeux()
    {
        $motCle = $_GET['keywords'];
        $array = [];
        if (!empty(trim($motCle))) {
            $sql = "SELECT * FROM exemplaires JOIN etat ON etat_id=etat.id WHERE nom LIKE '%$motCle%' OR description LIKE '%$motCle%'";
            $res = AccesDonnees::query($sql);
            $res->execute();
            $array = $res->fetchAll();
        }
        return $array;
    }

    /**
     * retourne un tableau assoc des infos d'un jeu dont l'id est l'argument
     *
     * @param [type] $id
     * @return [type] tableau associatif
     */
    public static function trouveUnJeu(int $idJeu)
    {
        $sql = "SELECT * FROM exemplaires
                JOIN etat ON etat_id = etat.id
                JOIN console ON console_id = console.id 
                JOIN categories ON categorie_id = categories.id
                JOIN tags ON tags_id = tags.id
                WHERE exemplaires.id = :id";

        $pdo = AccesDonnees::getPdo();
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $idJeu, PDO::PARAM_INT);
        $statement->execute();
        $leJeu = $statement->fetch(PDO::FETCH_ASSOC);
        return $leJeu;
    }

}
