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
session_start();//permet de créer la superglobale on la crée tjrs au debut ou restaure celle existante sur le serveur(sur xampp qui ouvre mysql(sgbdr)pour exploiter la bdd) 
$pdo = PdoGsb::getPdoGsb();//connection bdd l'application: dans la variable on appelle la fonction getPdoGsb de la classe PdoGsb 
$estConnecte = estConnecte();//appelle la fct° estConnecte(): Test si un utilisateur est connecté cette ligne est utile qd on revient a ct page aprés etre passé a la feille c_connexion
require 'vues/v_entete.php';
$uc = filter_input(INPUT_GET, 'uc', FILTER_SANITIZE_STRING);//filtre le contenue qui est envoye pr qu'il soit que en string pr pouvoir l'exploiter
if ($uc && !$estConnecte) { // si on est pas connecté et si il ya qqch dans $uc
    $uc = 'connexion';
} elseif (empty($uc)) {// normalement dans le deroulement des choses je devrais aller a l'accueil mais ds $uc g connexion
    $uc = 'accueil';
}
switch ($uc) {//uc est une variable qui peut contenir differentes choses au fur et a mesure
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
case 'validerFrais':
    include 'controleurs/c_validerFrais.php';
    break;
}
require 'vues/v_pied.php';//pied de page de l'accueil
