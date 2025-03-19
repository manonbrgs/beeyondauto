<?php 

// SYSTEME DE CHOIX DES DATES DE LOCATION

if(isset($_POST) && count($_POST)){

    $retourmsg = array(
        'msgdebut' => array(),
        'msgfin' => array(),
        'coherencedates' => array(),
    );

    if(
        array_key_exists('idPageLocation', $_POST) 
        && !empty($_POST['idPageLocation'])
    ) {
        settype($_POST['idPageLocation'], 'integer');

        if (
            array_key_exists('choixdatedebut', $_POST) 
            && !empty($_POST['choixdatedebut'])
        ){

            if ($_POST['choixdatedebut'] >= date('Y-m-d')){

                include_once '../../modele/page_produit/page_produit_location.php';

                choix_date_debut();

                $resultat_choixdatedebut = $_SESSION['choixdatedebut'];

                if ($resultat_choixdatedebut != 'Indisponible, veuillez choisir une autre date de départ'){

                    if (
                        array_key_exists('choixdatefin', $_POST) 
                        && !empty($_POST['choixdatefin'])
                    ){

                    if ($_POST['choixdatefin'] >= date('Y-m-d')){

                        include_once '../../modele/page_produit/page_produit_location.php';
                    
                        choix_date_fin();
        
                        $resultat_choixdatefin = $_SESSION['choixdatefin'];

                        if ($_POST['choixdatefin'] > $_POST['choixdatedebut']){

                            $resultat_coherencedates = '';
                            $resultat_choixdatefin = $_SESSION['choixdatefin'];

                            if ($resultat_choixdatefin != 'Indisponible, veuillez choisir une autre date de retour'){
                                $success = 1;
                                $retourmsg["success"] = $success;
                            }

                        } else {
                
                            $resultat_coherencedates = 'Sélectionnez des dates cohérentes';
                            $resultat_choixdatefin = "";
                            $resultat_choixdatedebut = "";
                        }
        
                    } else {
        
                        $resultat_choixdatefin = 'Saisissez une date supérieure ou égale à la date du jour';
        
                    }

                } else {

                    $resultat_choixdatefin = 'Saisissez une date de retour';

                }

                }
            
            } else {

                $resultat_choixdatedebut = 'Saisissez une date supérieure ou égale à la date du jour';

            }

        } else {

            $resultat_choixdatedebut = 'Saisissez une date de départ';

        }
    }
}

global $resultat_choixdatedebut;
global $resultat_choixdatefin;
global $resultat_coherencedates;

array_push($retourmsg['msgdebut'], $resultat_choixdatedebut);
array_push($retourmsg['msgfin'], $resultat_choixdatefin);
array_push($retourmsg['coherencedates'], $resultat_coherencedates);

echo json_encode ($retourmsg);
    
    



?>