<?php

session_start();

$retourmsg = array();

if(isset($_POST) && count($_POST)){

    $_SESSION['favoris_location'] = array();

    if(
        array_key_exists('idPageLocation', $_POST) 
        && !empty($_POST['idPageLocation']) 
        && ($_POST['idPageLocation'] > 0)
    ){
        include_once '../../modele/page_produit/favoris_location.php';

        informations_voiture_location();

        if (!is_array($_SESSION['favoris_location'])) {
            $_SESSION['favoris_location'] = array();
        } else {
            if (in_array($_SESSION['voiture_favoris_location'], $_SESSION['favoris_location'])){
                $retourmsg['echec'] = '<div class="feedback-msg error">
                                            <i class="cp cp-cross"></i>
                                            Votre véhicule est déjà dans vos favoris
                                       </div>';
            } else {
                $_SESSION['favoris_location'][] = $_SESSION['voiture_favoris_location'];

                $retourmsg['favoris'] = $_SESSION['favoris_location'];

                $retourmsg['success'] = '<div class="feedback-msg validate">
                                            <i class="cp cp-check-mark"></i>
                                            Votre véhicule a bien été ajouté aux favoris
                                        </div>';
            }
        }

    } else {

        $retourmsg['echec'] = '<div class="feedback-msg error">
                                    <i class="cp cp-cross"></i>
                                    Votre véhicule n\'a pas été ajouté aux favoris
                               </div>';            

    }
        
}

global $msg_retour;

echo json_encode ($retourmsg);

?>