<?php

    /*-------------------------------------------------------------
    Résultat afficher de la plus ancienne à la plus récente
    -------------------------------------------------------------*/
    function louer_resultat_tri_annee_croissant() {
        $_SESSION['louer'] = array();
        global $o_bdd;
        global $nb_vehicules_louer_par_page;
        global $premier_article_louer;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules_location ORDER BY anneedesortie ASC LIMIT :premier_article_louer, :nb_vehicules_louer_par_page');
        
        $requete->bindValue('premier_article_louer', $premier_article_louer,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_louer_par_page', $nb_vehicules_louer_par_page,PDO::PARAM_INT);

        $requete->execute();
        
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer'], $data);
            }
        }
        $requete->closeCursor();
    }
    
    /*-------------------------------------------------------------
    Résultat afficher de la plus récente à la plus ancienne
    -------------------------------------------------------------*/
    function louer_resultat_tri_annee_decroissant() {
        $_SESSION['louer'] = array();
        global $o_bdd;
        global $nb_vehicules_louer_par_page;
        global $premier_article_louer;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules_location ORDER BY anneedesortie DESC LIMIT :premier_article_louer, :nb_vehicules_louer_par_page');
        
        $requete->bindValue('premier_article_louer', $premier_article_louer,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_louer_par_page', $nb_vehicules_louer_par_page,PDO::PARAM_INT);

        $requete->execute();
        
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer'], $data);
            }
        }
        $requete->closeCursor();
    }

    /*-------------------------------------------------------------
    Résultat afficher de la moins chère à la plus chère
    -------------------------------------------------------------*/
    function louer_resultat_tri_prix_croissant() {
        $_SESSION['louer'] = array();
        global $o_bdd;
        global $nb_vehicules_louer_par_page;
        global $premier_article_louer;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules_location ORDER BY prix_journalier ASC LIMIT :premier_article_louer, :nb_vehicules_louer_par_page');
        
        $requete->bindValue('premier_article_louer', $premier_article_louer,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_louer_par_page', $nb_vehicules_louer_par_page,PDO::PARAM_INT);

        $requete->execute();
        
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer'], $data);
            }
        }
        $requete->closeCursor();
    }
    
    /*-------------------------------------------------------------
    Résultat afficher de la plus chère à la moins chère
    -------------------------------------------------------------*/
    function louer_resultat_tri_prix_decroissant() {
        $_SESSION['louer'] = array();
        global $o_bdd;
        global $nb_vehicules_louer_par_page;
        global $premier_article_louer;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules_location ORDER BY prix_journalier DESC LIMIT :premier_article_louer, :nb_vehicules_louer_par_page');
        
        $requete->bindValue('premier_article_louer', $premier_article_louer,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_louer_par_page', $nb_vehicules_louer_par_page,PDO::PARAM_INT);

        $requete->execute();
        
        while ($data = $requete->fetch())
        {
            if (!$data) // On teste si la réponse à la requête est vide.
            {
                echo 'La BDD n\'existe pas ou est vide.';
                break;
            }
            else
            {
                array_push($_SESSION['louer'], $data);
            }
        }
        $requete->closeCursor();
    }
?>