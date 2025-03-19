<?php
session_start();

$retourmsg = array();

if(isset($_POST) && count($_POST)){

    $_SESSION['favoris_achat'] = array();

    if(
        array_key_exists('idCarAchat', $_POST) 
        && !empty($_POST['idCarAchat']) 
    ){
        include_once '../../modele/page_produit/favoris_achat.php';

        informations_voiture_achat();

        if (!is_array($_SESSION['favoris_achat'])) {
            $_SESSION['favoris_achat'] = array();
        } else {
            if (in_array($_SESSION['voiture_favoris_achat'], $_SESSION['favoris_achat'])){
                $retourmsg['echec'] = '<div class="feedback-msg error">
                                            <i class="cp cp-cross"></i>
                                            Votre véhicule est déjà dans vos favoris
                                       </div>';
            } else {
                $_SESSION['favoris_achat'][] = $_SESSION['voiture_favoris_achat'];

                $retourmsg['favoris'] = $_SESSION['favoris_achat'];

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