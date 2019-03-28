<?php
/**
 * Gestion de la connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author Enkaoua Tsipora
 */

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
if (!$uc) {
    $uc = 'demandeconnexion';
}

switch ($action) {
case 'demandeConnexion':
    include 'vues/v_connexion.php';
    break;
case 'valideConnexion':
    $login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
    $mdp = filter_input(INPUT_POST, 'mdp', FILTER_SANITIZE_STRING);
    $visiteur = $pdo->getInfosVisiteur($login, $mdp);//$pdo et $monpdo c pareil a quoi il sert ici????******//dans variable visiteur ya un tableau avec les infos id, nom et prénom
    $comptable= $pdo->getInfosComptable($login, $mdp);
    if (!is_array($visiteur) && !is_array($comptable)) {//si la  $visiteur/$comptable na pas de tableau(array) alors...
        ajouterErreur('Login ou mot de passe incorrect');
        include 'vues/v_erreurs.php';
        include 'vues/v_connexion.php';
    } else {
        if(is_array($visiteur)){//on va séparer les variables du tableau
         $idUtilisateur = $visiteur['id'];
         $nom = $visiteur['nom'];
         $prenom = $visiteur['prenom'];
         $statut = 'visiteur';//pour que par la suite on ditingue facilement visiteur de comptable
        }elseif(is_array ($comptable)){
         $idUtilisateur = $comptable['id'];
         $nom = $comptable['nom'];
         $prenom = $comptable['prenom'];   
         $statut = 'comptable';
        }
        connecter($idUtilisateur, $nom, $prenom,$statut);
        header('Location: index.php');//permet de renvoyer a une page avec les données existantes
    }
    break;
default:
    include 'vues/v_connexion.php';
    break;
}
