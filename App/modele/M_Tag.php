<?php

/**
 * Les jeux sont rangés par TAG
 *
 * @author BECKER Marine
 */
class M_Tag {

    /**
     * Retourne toutes les tags sous forme d'un tableau associatif
     *
     * @return le tableau associatif des tags
     */
    public static function trouveLesTags() {
        $sql = "SELECT * FROM tags";
        $statement = AccesDonnees::query($sql);
        $lesLignes = $statement->fetchAll();
        return $lesLignes;
    }

}
