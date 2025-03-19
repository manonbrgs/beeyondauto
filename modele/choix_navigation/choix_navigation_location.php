<?php
    /*-------------------------------------------------------------
    Afficher de manière distincte les marques présentes dans la bdd 
    -------------------------------------------------------------*/
    function louer_navigation_a_facettes_marques() {
        $_SESSION['louer_marque'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT marque FROM vehicules_location ORDER BY marque ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_marque'], $data['marque']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_marques();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les types de voitures présents dans la bdd 
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_types() {
        $_SESSION['louer_type'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT type FROM vehicules_location ORDER BY type ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_type'], $data['type']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_types();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les nombres de places présents dans la bdd
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_places() {
        $_SESSION['louer_place'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT nombredeplaces FROM vehicules_location ORDER BY nombredeplaces ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_place'], $data['nombredeplaces']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_places();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les nombres de portes présents dans la bdd
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_portes() {
        $_SESSION['louer_porte'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT nombredeportes FROM vehicules_location ORDER BY nombredeportes ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_porte'], $data['nombredeportes']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_portes();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les moteurs présents dans la bdd
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_moteurs() {
        $_SESSION['louer_moteur'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT moteur FROM vehicules_location ORDER BY moteur ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_moteur'], $data['moteur']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_moteurs();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les boitedevitesse présents dans la bdd
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_boitedevitesse() {
        $_SESSION['louer_boitedevitesse'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT boitedevitesse FROM vehicules_location ORDER BY boitedevitesse ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_boitedevitesse'], $data['boitedevitesse']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_boitedevitesse();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les anneedesortie présents dans la bdd
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_anneedesortie() {
        $_SESSION['louer_anneedesortie'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT anneedesortie FROM vehicules_location ORDER BY anneedesortie ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_anneedesortie'], $data['anneedesortie']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_anneedesortie();

    /*----------------------------------------------------------------------
    Afficher de manière distincte les prix_journalier présents dans la bdd
    ----------------------------------------------------------------------*/
    function louer_navigation_a_facettes_prix_journalier() {
        $_SESSION['louer_prix_journalier'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT DISTINCT prix_journalier FROM vehicules_location ORDER BY prix_journalier ASC');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_prix_journalier'], $data['prix_journalier']);
            }
        }
        $requete->closeCursor();
    }
    louer_navigation_a_facettes_prix_journalier();

    /*-----------------------------------------------------------
    Afficher si le véhicule est disponible de suite à la location
    -----------------------------------------------------------*/

    $indisponible = 'INDISPONIBLE';
    $disponible = 'DISPONIBLE';
	
	function IsVehiculesDisponibleLocation() {
        $_SESSION['louer_vehicules_dispo'] = array();
        global $o_bdd;

        $requete = $o_bdd->query('SELECT idvehicule FROM location WHERE DATE(NOW()) BETWEEN debutlocation AND finlocation');
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer_vehicules_dispo'], $data['idvehicule']);
            }
        }
        $requete->closeCursor();
    }
    IsVehiculesDisponibleLocation();
?>