<?php
/**
 * Gestion de l'accueil
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author Enkaoua Tsipora
 */

//declaration des variables pour determiner si c'est un comptable/visiteur qui est coinnecte
$estComptableConnecte=estComptableConnecte();//appel de la methode estComptableConnecte()
$estVisiteurConnecte=estVisiteurConnecte ();

if ($estVisiteurConnecte) {
    include 'vues/v_accueil_visiteur.php';//si on est connecté a l'appli aller dans la page accueil
}
elseif ($estComptableConnecte) {    
     include 'vues/v_accueil_comptable.php';
} else {
    include 'vues/v_connexion.php';
}