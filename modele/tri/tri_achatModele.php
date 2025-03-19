<?php

    /*-------------------------------------------------------------
    Résultat afficher de la plus ancienne à la plus récente
    -------------------------------------------------------------*/
    
    function achat_resultat_tri_annee_croissant() {
        $_SESSION['achat'] = array();
        global $o_bdd;
        global $premier_article_achat;
        global $nb_vehicules_achat_par_page;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules ORDER BY anneedesortie ASC LIMIT :premier_article_achat, :nb_vehicules_achat_par_page');
        
        $requete->bindValue('premier_article_achat', $premier_article_achat,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_achat_par_page', $nb_vehicules_achat_par_page,PDO::PARAM_INT);

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
                array_push($_SESSION['achat'], $data);
            }
        }
        $requete->closeCursor();
    }

    /*-------------------------------------------------------------
    Résultat afficher de la plus récente à la plus ancienne
    -------------------------------------------------------------*/

    function achat_resultat_tri_annee_decroissant() {
        $_SESSION['achat'] = array();
        global $o_bdd;
        global $premier_article_achat;
        global $nb_vehicules_achat_par_page;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules ORDER BY anneedesortie DESC LIMIT :premier_article_achat, :nb_vehicules_achat_par_page');
        
        $requete->bindValue('premier_article_achat', $premier_article_achat,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_achat_par_page', $nb_vehicules_achat_par_page,PDO::PARAM_INT);

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
                array_push($_SESSION['achat'], $data);
            }
        }
        $requete->closeCursor();
    }

    /*-------------------------------------------------------------
    Résultat afficher de la moins chère à la plus chère
    -------------------------------------------------------------*/
            
    function achat_resultat_tri_prix_croissant() {
        $_SESSION['achat'] = array();
        global $o_bdd;
        global $nb_vehicules_achat_par_page;
        global $premier_article_achat;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules ORDER BY prix_vente ASC LIMIT :premier_article_achat, :nb_vehicules_achat_par_page');
        
        $requete->bindValue('premier_article_achat', $premier_article_achat,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_achat_par_page', $nb_vehicules_achat_par_page,PDO::PARAM_INT);

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
                array_push($_SESSION['achat'], $data);
            }
        }
        $requete->closeCursor();
    }
    
    /*-------------------------------------------------------------
    Résultat afficher de la plus chère à la moins chère
    -------------------------------------------------------------*/
    function achat_resultat_tri_prix_decroissant() {
        $_SESSION['achat'] = array();
        global $o_bdd;
        global $nb_vehicules_achat_par_page;
        global $premier_article_achat;

        $requete = $o_bdd->prepare('SELECT * FROM vehicules ORDER BY prix_vente DESC LIMIT :premier_article_achat, :nb_vehicules_achat_par_page');
        
        $requete->bindValue('premier_article_achat', $premier_article_achat,PDO::PARAM_INT);
        $requete->bindValue('nb_vehicules_achat_par_page', $nb_vehicules_achat_par_page,PDO::PARAM_INT);

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
                array_push($_SESSION['achat'], $data);
            }
        }
        $requete->closeCursor();
    }

?>