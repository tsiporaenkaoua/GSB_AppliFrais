<?php

$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING); //recupere le contenu d'action

$mois = getMois(date('d/m/Y'));
$moisPrecedent = getMoisPrecedent($mois);
$pdo->clotureFicheFrais($moisPrecedent);
$pdo = PdoGsb::getPdoGsb();

switch ($action) {

    case 'saisirVisiteurMois':
        $lesMois = getDouzeMoisPrecedents($mois);
        $lesClesM = array_keys($lesMois); //Retourne toutes les clés=variables ou un ensemble des clés d'un tableau
        $moisASelectionner = $lesClesM[0]; //mettre des var dans un tableau de clé permet que chaque valeur corrspond a un nombre(cle)et ainsi on peut choisir par quel variable commencer le tableau
        $lesVisiteurs = $pdo->getVisiteurs($pdo);
        $lesClesV = array_keys($lesVisiteurs);
        $visiteursASelectionner = $lesClesV[0];
        include 'vues/v_listeMoisVisiteurs.php';
        break;
    case 'afficherFrais':
        $leMois = filter_input(INPUT_POST, 'lstMois', FILTER_SANITIZE_STRING); //recupere le mois selectionné dans la vue
        $lesMois = getDouzeMoisPrecedents($mois); //met la possibilité de choisir les 12 mois precedents au cas ou on veut changer de mois pour acceder a ses fiches
        $moisASelectionner = $leMois;
        $leVisiteur = filter_input(INPUT_POST, 'lstVisiteur', FILTER_SANITIZE_STRING);
        $lesVisiteurs = $pdo->getVisiteurs($pdo);
        $visiteursASelectionner = $leVisiteur;
        include 'vues/v_listeMoisVisiteurs.php';
        
        
    default:
        break;
}

