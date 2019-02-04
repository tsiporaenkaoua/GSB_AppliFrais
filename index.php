<?php
/**
 * Index du projet GSB
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author Enkaoua Tsipora
*/

require_once 'includes/fct.inc.php';//le suffixe _once sert à limiter cette inclusion à une seule par page.cette bibliotheque est necessaire pour le php
require_once 'includes/class.pdogsb.inc.php';//require: inclure
session_start();//permet de créer la superglobale on la crée tjrs au debut 
$pdo = PdoGsb::getPdoGsb();//connection ouverture de l'application:dans la variable on appelle la fonction getPdoGsb de la classe PdoGsb 
$estConnecte = estConnecte();//Test si un utilisateur est connecté YA QUOI dans idutilisateur(dans la page fct.inc???
require 'vues/v_entete.php';//c'est l'entete . message d'erreur si il n'arrive pas à l'inclure
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);//filtre le contenue qui est envoye pr qu'il soit que en string pr pouvoir l'exploiter
if ($uc && !$estConnecte) { // si on est pas connecté et si il ya qqch dans $uc
    $uc = 'connexion';
} elseif (empty($uc)) {
    $uc = 'accueil';
}
switch ($uc) {//uc est une variable qui peut contenir differentes choses
case 'connexion':
    include 'controleurs/c_connexion.php';
    break;
case 'accueil':
    include 'controleurs/c_accueil.php';
    break;
case 'gererFrais':
    include 'controleurs/c_gererFrais.php';
    break;
case 'etatFrais':
    include 'controleurs/c_etatFrais.php';
    break;
case 'deconnexion':
    include 'controleurs/c_deconnexion.php';
    break;
}
require 'vues/v_pied.php';//pied de page de l'accueil
