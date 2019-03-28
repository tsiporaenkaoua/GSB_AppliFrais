<?php
/**
 * Vue Connexion
 *
 * PHP Version 7
 *
 * @category  PPE
 * @package   GSB
 * @author Enkaoua Tsipora
 */
?>

<div class="col-md-4">
    <form action="index.php?uc=validerFrais&action=afficherFrais"
        method="post" role="form">
        
        <div class="form-group">
            <label for="lstVisiteur" accesskey="v">Choisir le visiteur: </label>
            <select id="lstVisiteur" name="lstVisiteur" class="form-control">
                <?php
                foreach ($lesVisiteurs as $unVisiteur) {
                    $nom = $unVisiteur ['nom'];
                    $prenom = $unVisiteur['prenom'];
                    $leVisiteur = $unVisiteur['id'];
                     if ($leVisiteur == $visiteursASelectionner) {
                    ?>
                     <option selected value="<?php echo $leVisiteur ?>">
                            <?php echo $nom . ' ' . $prenom ?></option>
                            <?php
                    } else {
                        ?>
                    <option value="<?php echo $leVisiteur ?>">
                        <?php echo $nom . ' ' . $prenom ?></option>

                    <?php
                    }
                }
                ?>    
            </select>
        </div>

        <div class="form-group">
            <label for="lstMois" accesskey="m">Mois : </label>
            <select id="lstMois" name="lstMois" class="form-control">
                <?php
                foreach ($lesMois as $unMois) {
                    $leMois = $unMois['mois'];
                    $numAnnee = $unMois['numAnnee'];
                    $numMois = $unMois['numMois'];
                    if ($leMois == $moisASelectionner) {
                        ?>
                        <option selected value="<?php echo $leMois ?>">
                            <?php echo $numMois . '/' . $numAnnee ?> </option>
                            <?php
                    } else {
                        ?>
                        <option value="<?php echo $leMois ?>">
                        <?php echo $numMois . '/' . $numAnnee ?> </option>
                        <?php
                    }
                }
                ?>    

            </select>
        </div>

        <input id="ok" type="submit" value="Valider" class="btn btn-success" 
               role="button">
        <input id="annuler" type="reset" value="Effacer" class="btn btn-danger" 
               role="button">
    </form>
</div>
