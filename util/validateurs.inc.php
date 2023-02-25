<?php

/*
 * Fonctions de validations
 */

/**
 * teste si une chaîne a un format de code postal
 *
 * Teste le nombre de caractères de la chaîne et le type entier (composé de chiffres)
 * @param $codePostal : la chaîne testée
 * @return : vrai ou faux
 */
function estUnCp($codePostal)
{
    return strlen($codePostal) == 5 && estEntier($codePostal);
}

/**
 * teste si une chaîne est un entier
 *
 * Teste si la chaîne ne contient que des chiffres
 * @param $valeur : la chaîne testée
 * @return : vrai ou faux
 */
function estEntier($valeur)
{
    return preg_match("/[^0-9]/", $valeur) == 0;
}

/**
 * Teste si une chaîne a le format d'un mail
 *
 * Utilise les expressions régulières
 * @param $mail : la chaîne testée
 * @return : vrai ou faux
 */
function estUnMail($mail)
{
    return preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#', $mail);
}

/**
 * Teste la fiabilité d'un mot de passe 
 *
 * Utilise les expressions régulières
 * @param $mdp : la chaîne testée
 * @return : vrai ou faux
 */
function estFort($mdp)
{
    return preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,}$/', $mdp);
}

/**
 * Teste l'unicité d'un pseudo
 *
 * Utilise les expressions régulières
 * @param $pseudo : la chaîne testée
 * @return : vrai ou faux
 */
// function estUnique($pseudo) {
//     return (' ', $pseudo);
// }

/**
 * Teste si tous les champs de la page inscription sont remplis
 *
 * Utilise les expressions régulières
 * @param $nom, $prenom, $adresse, $ville, $cp, $mail, $pseudo, $mdp
 * @return : vrai ou faux
 */
function estRempli($nom, $prenom, $adresse, $ville, $cp, $mail, $pseudo, $mdp)
{
    return !empty($nom)  || !empty($prenom)  || !empty($adresse) || !empty($ville)  || !empty($cp)  || !empty($mail)  || !empty($pseudo)  || !empty($mdp);
}
