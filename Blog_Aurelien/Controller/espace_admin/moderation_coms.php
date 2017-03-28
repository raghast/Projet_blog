<?php

	// Attribution de l'id du billet à une variable session en cas de modération de commentaires et de rechargement de la page
	if (!empty($_POST['id_billet'])) 
	{
		$_SESSION['id_billet'] = $_POST['id_billet'];
	}

	// Condition pour voir la page : être connecté
	if (isConnected())
		{
			// Importation et utilisation d'une fonction de vérification de l'existence de l'article sélectionné
			require_once 'Modele/fonctions_gestion_billet.php';
			if (!empty(check_billet($_SESSION['id_billet']))) 
			{
				// Importations des fonctions utiles à la page de modération de commentaires et l'affichage des avatars
				require_once 'Modele/fonctions_coms.php';
				require_once 'Modele/fonctions_coms_moderation.php';
				require_once 'Utils/fonction_gravatar.php';
				// Conditions pour valider un commentaire : Avoir choisi valider et CRSF (à vérifier)
				if (!empty($_POST['choix']) AND $_POST['choix'] == 'valid' AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
				{
					if ($_SESSION['token'] == $_POST['token']) 
          			{
          			// Validation du commentaire et affichage du message 'succés'
					valid_com($_POST['id_com']);
					echo getFlash();
					}
				}
				// Conditions pour supprimer un commentaire : Avoir choisi supprimer et CRSF (à vérifier)
				elseif (!empty($_POST['choix']) AND $_POST['choix'] == 'delete' AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
				{
					if ($_SESSION['token'] == $_POST['token']) 
          			{	
          			// Suppression du commentaire et affichage du message 'succés'
					delete_com($_POST['id_com']);
					echo getFlash();
					}
				}
				// Avatar par défault pour la fonction gravatar
				$default = "http://www.leukeavatars.nl/avatars/pokemon/pokemon_avatars_1.gif";
				// Taille du gravatar en pixels
				$size=80;
				// Récupération du billet sélectionné
				$billet = find($_SESSION['id_billet']);
				// Récupération de TOUS les commentaires associés à ce billet
				$commentaires = moderation_coms($_SESSION['id_billet']);
				// Affichage de la vue de la page de modération des commentaires
				require_once 'Vue/Vue_espace_admin/commentaires/vue_moderation_commentaires.php';
			}
			else
			{
				require_once 'Vue/404.php';
			}
			
		}
	else
		{
			echo "Vous devez être connecté pour voir cette partie du site !";
		}
