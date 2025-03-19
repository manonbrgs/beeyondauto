<?php

    $_SESSION['voiture_favoris_achat'] = '';

    function informations_voiture_achat() {

        global $o_bdd;

        $idcarachat = $_POST['idCarAchat'];

        $sql = 'SELECT * FROM vehicules WHERE id = :idcarachat';
        
        include_once '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idcarachat' => $idcarachat]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['voiture_favoris_achat'] = 0;
            }
            else
            {
                $_SESSION['voiture_favoris_achat'] = $data;
            }
        $requete->closeCursor();
    }

?>