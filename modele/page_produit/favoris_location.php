<?php

    $_SESSION['voiture_favoris_location'] = '';

    function informations_voiture_location() {

        global $o_bdd;

        $idpagelocation = $_POST['idPageLocation'];

        $sql = 'SELECT * FROM vehicules_location WHERE id = :idpagelocation';
        
        include_once '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idpagelocation' => $idpagelocation]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['voiture_favoris_location'] = 0;
            }
            else
            {
                $_SESSION['voiture_favoris_location'] = $data;
            }
        $requete->closeCursor();
    }

?>