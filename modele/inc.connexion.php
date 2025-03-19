<?php
	// Paramètres de connexion
	$_db = array(
		'host'		=>	'localhost',
		'dbname'	=>	'manonbou1_beeyondauto',
		'user'		=>	'manonbou1_manon',
		'passwd'	=>	'T^mP@gJR&Frsk9U7WHX7'
	);

	// Connexion à la base de données
	// $o_bdd est un objet correspondant à la connexion à la BDD
	$o_bdd = new PDO("mysql:host=".$_db['host'].";dbname=".$_db['dbname'], $_db['user'], $_db['passwd']);
	
	/* 
		La structure try ... catch permet de réaliser les actions suivantes :
		PHP essaie d'exécuter les instructions présentes à l'intérieur du bloc "try"
		En cas d'erreur, les instructions du bloc "catch" sont exécutées.
		Dans ce cas, un message d'erreur est affiché.
	*/
	try
	{
		/* La ligne ci-dessous permet d'activer les erreurs lors de la connexion à la BDD via PDO.
		Les messages d'erreur lié à des requêtes SQL comportant des erreurs seront plus clairs. */
		$o_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	catch(Exception $e)
	{
		// On lance une fonction PHP qui permet de connaître l'erreur renvoyée lors de la connection à la base (en récupérant le message lié à l'exception)
		die($e->getMessage());
	}

?>