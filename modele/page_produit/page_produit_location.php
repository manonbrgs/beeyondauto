<?php

// AFFICHER LA PAGE CAR-PAGE AVEC LES DONNEES DE LA VOITURE SELECTIONNEE
    $_SESSION['car_page_location'] = array();

    function car_page_location() {
        
        global $o_bdd;
    
        $requete = $o_bdd->prepare('SELECT * FROM vehicules_location WHERE id = :idcarlocation');
        $requete -> bindValue(':idcarlocation', $_GET['idCarLocation'], PDO::PARAM_INT);
        $requete -> execute();
    
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo "Aucune voiture n'est à louer";
                break;
            }
            else
            {
                array_push($_SESSION['car_page_location'], $data);
            }
        }
        $requete->closeCursor();
    }

// SYSTEME DE CHOIX DES DATES DE LOCATION

    // VOITURE DANS TABLEAU LOCATION
    $_SESSION['verificationvoiturelocation'] = '';

    function verification_voiture_location() {

        global $o_bdd;

        $idpagelocation = $_POST['idPageLocation'];

        $sql = 'SELECT * FROM location WHERE idvehicule = :idpagelocation';
        
        include_once '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idpagelocation' => $idpagelocation]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['verificationvoiturelocation'] = 0;
            }
            else
            {
                $_SESSION['verificationvoiturelocation'] = 1;
            }
        $requete->closeCursor();
    }

    // CHOIX DATE DE DEBUT DE LOCATION
    $_SESSION['choixdatedebut'] = '';

    function choix_date_debut() {

        global $o_bdd;

        $choixdatedebut = $_POST['choixdatedebut'];
        $idpagelocation = $_POST['idPageLocation'];

        $sql = 'SELECT * FROM location WHERE idvehicule = :idpagelocation && :choixdatedebut BETWEEN debutlocation AND finlocation';
        
        include_once '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idpagelocation' => $idpagelocation, ':choixdatedebut' => $choixdatedebut]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['choixdatedebut'] = 'Date de début souhaitée : '.$choixdatedebut;
            }
            else
            {
                $_SESSION['choixdatedebut'] = 'Indisponible, veuillez choisir une autre date de départ';
            }
        $requete->closeCursor();
    }


    // CHOIX DATE DE FIN DE LOCATION
    $_SESSION['choixdatefin'] = '';

    function choix_date_fin() {
        
        $choixdatefin = $_POST['choixdatefin'];
        $idpagelocation = $_POST['idPageLocation'];

        global $o_bdd;

        $sql = 'SELECT * FROM location WHERE idvehicule = :idpagelocation && :choixdatefin BETWEEN debutlocation AND finlocation';
        
        include_once '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idpagelocation' => $idpagelocation, ':choixdatefin' => $choixdatefin]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['choixdatefin'] = 'Date de fin souhaitée : '.$choixdatefin;
            }
            else
            {
                $_SESSION['choixdatefin'] = 'Indisponible, veuillez choisir une autre date de retour';
            }
        $requete->closeCursor();
                
    }

    // AJOUT DANS LES RESERVATIONS
    $_SESSION['ajoutreservationlocation'] = '';

    function ajout_reservation_location() {
        
        $choixdatefin = $_POST['choixdatefin'];
        $idpagelocation = $_POST['idPageLocation'];

        global $o_bdd;

        $sql = 'SELECT * FROM location WHERE idvehicule = :idpagelocation && :choixdatefin BETWEEN debutlocation AND finlocation';
        
        include_once '../../modele/inc.connexion.php';
        $requete = $o_bdd->prepare($sql);
        $requete -> execute([':idpagelocation' => $idpagelocation, ':choixdatefin' => $choixdatefin]);
        
        $data = $requete->fetch();
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                $_SESSION['choixdatefin'] = $choixdatefin;
            }
            else
            {
                $_SESSION['choixdatefin'] = 'Veuillez choisir une autre date de retour';
            }
        $requete->closeCursor();
                
    }

?>