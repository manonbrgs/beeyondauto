<?php 

function ajoutReservationAchatBDD(){
    include '../../modele/inc.connexion.php';

    $_SESSION['reponse'] = array();
    $attributIdCarAchat = $_POST['attributIdCarAchat'];
    $choixquantite = $_POST["choixquantite"];

    $new_achat = $o_bdd->prepare('INSERT INTO achat (username, idvehicule, dateachat, quantite) VALUES (:username, :idvehicule, :dateachat, :quantite)');
    $date = date("Y-m-d");
    $new_achat->execute(array(
        'username' => strip_tags($_POST['username']),
        'idvehicule' => strip_tags($attributIdCarAchat),
        'dateachat' => strip_tags($date),
        'quantite' => strip_tags($choixquantite)
    ));

    $_SESSION['reponse'] = 1;

    $new_achat->closeCursor();
}

function gestion_stock (){
    include '../../modele/inc.connexion.php';

    $attributIdCarAchat = strip_tags($_POST['attributIdCarAchat']);
    $choixquantite = strip_tags($_POST["choixquantite"]);

    $gestion_stock = $o_bdd->prepare('UPDATE vehicules SET stock = stock - :nouveau_stock WHERE id = :attributIdCarAchat');
    $gestion_stock->execute(array(
        'nouveau_stock' => $choixquantite,
        'attributIdCarAchat' => $attributIdCarAchat
    ));

    $gestion_stock->closeCursor();
}

$_SESSION['voiture_reservation_achat'] = '';

function informations_voiture_achat() {

    global $o_bdd;

    $attributIdCarAchat = $_POST['attributIdCarAchat'];

    $sql = 'SELECT * FROM vehicules WHERE id = :attributIdCarAchat';
    
    include '../../modele/inc.connexion.php';
    $requete = $o_bdd->prepare($sql);
    $requete -> execute([':attributIdCarAchat' => $attributIdCarAchat]);
    
    $data = $requete->fetch();
        if (!$data) // On teste si la réponse à la requête est vide.
        {
            $_SESSION['voiture_reservation_achat'] = 0;
        }
        else
        {
            $_SESSION['voiture_reservation_achat'] = $data;
        }
    $requete->closeCursor();
}

?>