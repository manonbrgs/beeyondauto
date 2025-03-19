<?php
require_once 'inc.connexion.php';

// PAGE ACHAT
	
	// SIDEBAR CHOIX DE NAVIGATION
		
		require_once 'choix_navigation/choix_navigation_achat.php';
	
	// NAVIGATION A FACETTES

		//require_once 'navigation_facettes/facettes_achat.php';

	// RESULTATS

		require_once 'pagination/pagination_achat.php';

		require_once 'tri/tri_achatModele.php';
	
	// PAGE PRODUIT

		require_once 'page_produit/page_produit_achat.php';
		

// PAGE LOCATION
	
	// SIDEBAR CHOIX DE NAVIGATION
		
		require_once 'choix_navigation/choix_navigation_location.php';
	
	// NAVIGATION A FACETTES

		//require_once 'navigation_facettes/facettes_location.php';

	// RESULTATS

		require_once 'pagination/pagination_location.php';

		require_once 'tri/tri_locationModele.php';

	// PAGE PRODUIT

		require_once 'page_produit/page_produit_location.php';


// GESTION CLIENT

	// INSCRIPTION

		require_once 'gestion_client/inscription.php';

// VENTE 

require_once 'vente-form/vente-form.php';

?>