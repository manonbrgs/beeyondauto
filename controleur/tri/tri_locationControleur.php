<?php 

if(isset($_GET) && count($_GET)){

    /*-------------------------------------------------------------
    Résultat afficher de la plus ancienne à la plus récente
    -------------------------------------------------------------*/
    if (array_key_exists('tri_location', $_GET) 
    && !empty($_GET['tri_location'])) {
        
        $tri_location = strip_tags ($_GET['tri_location']);

        if (gettype($tri_location) === 'string'){

            $_tri_location = array(
                "location_prix_croissant",
                "location_prix_decroissant",
                "location_annee_croissant",
                "location_annee_decroissant"
            );

            if (in_array($tri_location, $_tri_location)
            && $tri_location === 'location_annee_croissant') {
            
                louer_resultat_tri_annee_croissant();
                	
            }
        }
    }
    
    /*-------------------------------------------------------------
    Résultat afficher de la plus récente à la plus ancienne
    -------------------------------------------------------------*/
    if (array_key_exists('tri_location', $_GET) 
    && !empty($_GET['tri_location'])) {
        
        $tri_location = $_GET['tri_location'];

        if (gettype($tri_location) === 'string'){

            $_tri_location = array(
                "location_prix_croissant",
                "location_prix_decroissant",
                "location_annee_croissant",
                "location_annee_decroissant"
            );

            if (in_array($tri_location, $_tri_location)
            && $tri_location === 'location_annee_decroissant') {
            
                louer_resultat_tri_annee_decroissant();		

            }
        }
    }

    /*-------------------------------------------------------------
    Résultat afficher de la moins chère à la plus chère
    -------------------------------------------------------------*/
    if (array_key_exists('tri_location', $_GET) 
    && !empty($_GET['tri_location'])) {
        
        $tri_location = $_GET['tri_location'];

        if (gettype($tri_location) === 'string'){

            $_tri_location = array(
                "location_prix_croissant",
                "location_prix_decroissant",
                "location_annee_croissant",
                "location_annee_decroissant"
            );

            if (in_array($tri_location, $_tri_location)
            && $tri_location === 'location_prix_croissant') {

                louer_resultat_tri_prix_croissant();

            }
        }
    }
    
    /*-------------------------------------------------------------
    Résultat afficher de la plus chère à la moins chère
    -------------------------------------------------------------*/
    if (array_key_exists('tri_location', $_GET) 
    && !empty($_GET['tri_location'])) {
        
        $tri_location = $_GET['tri_location'];

        if (gettype($tri_location) === 'string'){

            $_tri_location = array(
                "location_prix_croissant",
                "location_prix_decroissant",
                "location_annee_croissant",
                "location_annee_decroissant"
            );

            if (in_array($tri_location, $_tri_location)
            && $tri_location === 'location_prix_decroissant') {

                louer_resultat_tri_prix_decroissant();	

            }
        }
    }
}
?>