<?php

/**
 * Classe d'accès aux données.

 * Utilise les services de la classe PDO
 * pour l'application Lord Of Geek (LOG)
 * Les attributs sont tous statiques,
 * les 4 premiers pour la connexion
 * $monPdo de type PDO
 * $monPdoGsb qui contiendra l'unique instance de la classe
 *
 * @package default
 * @author Loïc LOG
 * @version    1.0
 * @link       http://www.php.net/manual/fr/book.pdo.php
 */
class AccesDonnees
{

    private static $serveur = 'mysql:host=localhost';
    private static $bdd = 'dbname=ma_base_jeux';
    private static $user = 'root';
    private static $mdp = '';

    /**
     *
     * @var PDO
     */
    private static $monPdo;

    /**
     * Fonction statique qui crée l'unique instance de la classe
     * retourne l'unique objet de la classe
     * @return PDO
     */
    public static function getPdo()
    {
        try {
            if (AccesDonnees::$monPdo == null) {
                AccesDonnees::$monPdo = new PDO(AccesDonnees::$serveur . ';' . AccesDonnees::$bdd, AccesDonnees::$user, AccesDonnees::$mdp);
                AccesDonnees::$monPdo->query("SET CHARACTER SET utf8");
                AccesDonnees::$monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return AccesDonnees::$monPdo;
        } catch (PDOException $e) {
            echo 'Exception -> ';
            var_dump($e->getMessage());
        }
    }

    /**
     * Exécution d'une requete de lecture
     * @param string $requete_sql
     * @return PDOStatement
     */
    public static function query(string $requete_sql)
    {
        return AccesDonnees::getPdo()->query($requete_sql);
    }

    // /**
    //  * Execution d'une requete d'écriture
    //  * @param string $requete_sql
    //  * @return int
    //  */
    public static function exec(string $requete_sql)
    {
        return AccesDonnees::getPdo()->exec($requete_sql);
    }

    // /**
    //  * La méthode prepare, parce que je pige rien à son exec de m
    //  * @param string $requete_sql
    //  * @return int???
    //  */
    public static function prepare(string $requete_sql)
    {
        return AccesDonnees::getPdo()->prepare($requete_sql);
    }
}
