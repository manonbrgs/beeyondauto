<?php
// Inspiration d'un tuto réalisé par Grafikart

    // Détermination de la page active
    if (isset($_GET['page'])
        && !empty($_GET['page'])){ // Vérification de la présence d'un paramètre GET avec 'page' + vérification s'il est vide ou non
        $activ_page_louer = (int) strip_tags($_GET['page']); // S'il existe et n'est pas vide : on le transforme en integer, on le force à être un nombre entier + suppression des balises HTML et PHP pour éviter l'injection de code dans l'url
    } else {
        $activ_page_louer = 1; // Sinon : on le détermine en page 1
    }

    $requete = $o_bdd->prepare('SELECT COUNT(*) AS nb_vehicules_louer FROM vehicules_location'); // requête ppur déterminer le nombre de véhicules disponible à la location
    $requete->execute();
    $resultat_vehicules_louer = $requete->fetch();
    $nb_vehicules_louer = (int) $resultat_vehicules_louer['nb_vehicules_louer']; // Nombre totale de véhicules en location

    $nb_vehicules_louer_par_page = 9; // Détermination du nombre d'articles par page

    $nb_pages_total_louer = ceil($nb_vehicules_louer / $nb_vehicules_louer_par_page); // Calcul du nombre de pages nécessaire

    $premier_article_louer = ($activ_page_louer * $nb_vehicules_louer_par_page) - $nb_vehicules_louer_par_page; // Calcul du premier véhicule de la page

    // Fonction pagination
    $_SESSION['louer'] = array();

    global $o_bdd;

    $requete = $o_bdd->prepare('SELECT * FROM vehicules_location LIMIT :premier_article_louer, :nb_vehicules_louer_par_page');

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

    
?>