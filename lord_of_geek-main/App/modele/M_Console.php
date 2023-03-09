<?php

/**
 * Les jeux sont rangés par console
 *
 * @author BECKER Marine
 */
class M_Console {

    /**
     * Retourne toutes les consoles sous forme d'un tableau associatif
     *
     * @return le tableau associatif des consoles
     */
    public static function trouveLesConsoles() {
        $req = "SELECT * FROM console";
        $res = AccesDonnees::query($req);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}
