<?php 

    function ajoutReservationLocationBDD(){
        include '../../modele/inc.connexion.php';

        $_SESSION['reponse'] = array();
        $attributIdCarAchat = $_POST['idPageLocation'];
        $choixdatedebut = $_POST['choixdatedebut'];
        $choixdatefin = $_POST['choixdatefin'];

        $new_location = $o_bdd->prepare('INSERT INTO location (username, idvehicule, debutlocation, finlocation) VALUES (:username, :idvehicule, :debutlocation, :finlocation)');
        $new_location->execute(array(
            'username' => strip_tags($_POST['username']),
            'idvehicule' => strip_tags($attributIdCarAchat),
            'debutlocation' => strip_tags($choixdatedebut),
            'finlocation' => strip_tags($choixdatefin)
        ));

        $_SESSION['reponse'] = 1;

        $new_location->closeCursor();
    }

    $_SESSION['voiture_reservation_location'] = '';

    function informations_voiture_location() {

        global $o_bdd;

        $idPageLocation = $_POST['idPageLocation'];

        $sql = 'SELECT * FROM vehicules_location WHERE id = :idPageLocation';
        
        include '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idPageLocation' => $idPageLocation]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['voiture_reservation_location'] = 0;
            }
            else
            {
                $_SESSION['voiture_reservation_location'] = $data;
            }
        $requete->closeCursor();
    }

?>