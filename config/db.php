<?php
	/**
	 * Databasse config & connexion
	 */
	// Enable us to use Headers
	ob_start();
	
	// Set sessions
	if(!isset($_SESSION)) {
		session_start();
	}
	
	$HOST = 'localhost';
	$USER = 'root';
	$PASS = 'root';
	$NAME = 'tp_phoenix';
	
	// Try and connect using the info above.
	$con = mysqli_connect($HOST, $USER, $PASS, $NAME);
	if (mysqli_connect_errno()) {
		// S'il y a une erreur avec la connexion, arrêtez le script et affichez l'erreur.
		exit('Échec de la connexion à MySQL: ' . mysqli_connect_error());
	}