<?php
	
	// Déconnection de l'administrateur
	if (!empty($_POST['deco']))
		{
			disconnect();
			echo "Vous vous êtes déconnecté avec succés !";
		}
	
	// Connection de l'administrateur
	if (!empty($_POST['login']) AND !empty($_POST['password']))
		{
			first_connection($_POST['login'], $_POST['password']);
		}
	// Vue de la page connection
	require_once 'Vue/Vue_espace_admin/vue_connection.php';


