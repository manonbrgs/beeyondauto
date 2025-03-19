<?php 

// RESERVATION

$retourmsg = array(
    'msg_retour' => array(),
);

if (isset($_POST) && count($_POST)){

    if (
        array_key_exists('attributIdCarAchat', $_POST) 
        && !empty($_POST['attributIdCarAchat'])
    ){

        settype($_POST['attributIdCarAchat'], 'integer');

        if (
            isset($_POST["quantite"]) &&
            array_key_exists('quantite', $_POST) &&
            (!empty($_POST["quantite"]))
        ){

            settype($_POST['quantite'],"integer");

            if (
                is_numeric($_POST["quantite"]) &&
                preg_match('/^\d+$/', $_POST["quantite"]) &&
                ($_POST["quantite"] > 0)
            ){

                include_once '../../modele/page_produit/page_produit_achat.php';
                        
                verification_stock();
                $stock = $_SESSION['quantite']['stock'];

                if(
                    ($stock > 0) &&
                    ($stock >= $_POST["quantite"])
                ){

                    $retourmsg['success'] = $stock;
                    $msg_retour = 'Véhicule disponible pour cette quantité';

                } else {

                    $msg_retour = 'Véhicule non disponible pour la quantité choisie';

                }

            } else {

                $msg_retour = 'Sélectionner un chiffre supérieur à 0';

            }

        } else {

            $msg_retour = 'Aucune quantité n\'a été sélectionnée'; 

        }

    } else {

        $msg_retour = 'Aucun véhicule sélectionné';

    }

} else {

    $msg_retour = 'Aucune quantité n\'a été sélectionnée';

}

global $msg_retour;

array_push($retourmsg['msg_retour'], $msg_retour);

echo json_encode ($retourmsg);




?>