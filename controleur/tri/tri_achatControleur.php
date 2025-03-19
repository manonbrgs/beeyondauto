<?php 

if(isset($_GET) && count($_GET)){

    /*-------------------------------------------------------------
    Résultat afficher de la plus ancienne à la plus récente
    -------------------------------------------------------------*/
    if (array_key_exists('tri_achat', $_GET) 
    && !empty($_GET['tri_achat'])) {
        
        $tri_achat = strip_tags ($_GET['tri_achat']);

        if (gettype($tri_achat) === 'string'){

            $_tri_achat = array(
                "achat_prix_croissant",
                "achat_prix_decroissant",
                "achat_annee_croissant",
                "achat_annee_decroissant"
            );

            if (in_array($tri_achat, $_tri_achat)
            && $tri_achat === 'achat_annee_croissant') {
            
                achat_resultat_tri_annee_croissant();	

            }
        }
    }

    /*-------------------------------------------------------------
    Résultat afficher de la plus récente à la plus ancienne
    -------------------------------------------------------------*/
    if (array_key_exists('tri_achat', $_GET) 
    && !empty($_GET['tri_achat'])) {
        
        $tri_achat = $_GET['tri_achat'];

        if (gettype($tri_achat) === 'string'){

            $_tri_achat = array(
                "achat_prix_croissant",
                "achat_prix_decroissant",
                "achat_annee_croissant",
                "achat_annee_decroissant"
            );

            if (in_array($tri_achat, $_tri_achat)
            && $tri_achat === 'achat_annee_decroissant') {
            
                achat_resultat_tri_annee_decroissant();		

            }
        }
    }

    /*-------------------------------------------------------------
    Résultat afficher de la moins chère à la plus chère
    -------------------------------------------------------------*/
    if (array_key_exists('tri_achat', $_GET) 
    && !empty($_GET['tri_achat'])) {
        
        $tri_achat = $_GET['tri_achat'];

        if (gettype($tri_achat) === 'string'){

            $_tri_achat = array(
                "achat_prix_croissant",
                "achat_prix_decroissant",
                "achat_annee_croissant",
                "achat_annee_decroissant"
            );

            if (in_array($tri_achat, $_tri_achat)
            && $tri_achat === 'achat_prix_croissant') {
            
                achat_resultat_tri_prix_croissant();	

            }
        }
    }
    
    /*-------------------------------------------------------------
    Résultat afficher de la plus chère à la moins chère
    -------------------------------------------------------------*/
    if (array_key_exists('tri_achat', $_GET) 
    && !empty($_GET['tri_achat'])) {
        
        $tri_achat = $_GET['tri_achat'];

        if (gettype($tri_achat) === 'string'){

            $_tri_achat = array(
                "achat_prix_croissant",
                "achat_prix_decroissant",
                "achat_annee_croissant",
                "achat_annee_decroissant"
            );

            if (in_array($tri_achat, $_tri_achat)
            && $tri_achat === 'achat_prix_decroissant') {
            
                achat_resultat_tri_prix_decroissant();	
                		
            }
        }
    }
}

?>