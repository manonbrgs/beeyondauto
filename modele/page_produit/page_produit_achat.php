<?php

// AFFICHER LA PAGE CAR-PAGE AVEC LES DONN2ES DE LA VOITURE SELECTIONNEE

function car_page_achat() {
    $_SESSION['car_page_achat'] = array();
    global $o_bdd;

    $requete = $o_bdd->prepare('SELECT * FROM vehicules WHERE id = :idcarachat');
    $requete -> bindValue(':idcarachat', $_GET['idCarAchat'], PDO::PARAM_INT);
    $requete -> execute();
    
    while ($data = $requete->fetch())
    {
        if (!$data) // On teste si la réponse à la requête est vide.
        {
            echo 'Acune voiture n\'est à vendre';
            break;
        }
        else
        {
            array_push($_SESSION['car_page_achat'], $data);
        }
    }
    $requete->closeCursor();
}

// VERIFICATION STOCK

function verification_stock(){

    $attributIdCarAchat = $_POST['attributIdCarAchat'];

    global $o_bdd;

    $sql = 'SELECT * FROM vehicules WHERE id = :attributIdCarAchat';
    
    include_once '../../modele/inc.connexion.php';
    $requete = $o_bdd->prepare($sql);
    $requete -> execute([':attributIdCarAchat' => strip_tags($attributIdCarAchat)]);
    
    $data = $requete->fetch();
        if (!$data) // On teste si la réponse à la requête est vide.
        {
            $_SESSION['quantite'] = 0;
        }
        else
        {
            $_SESSION['quantite'] = $data;
        }
    
        $requete->closeCursor();

}

?>