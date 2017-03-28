<?php

	// Initialisation du message 'succés' utilisé sur les pages de l'espace admin
	$message = 'L\'opération a été effectuée avec succés !';
	addFlash($message);
	// Condition pour voir la page : être connecté
	if (isConnected())
		{
			// Affichage Vue de la page
			require_once 'Vue/Vue_espace_admin/vue_sommaire_admin.php';

		}
	else
		{
			echo "Vous devez être connecté pour voir cette partie du site !";
		}
