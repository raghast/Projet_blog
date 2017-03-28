<?php

// Importation des fonction utiles à la page commentaires et la fonction qui affiche les avatars
require_once 'Modele/fonctions_coms.php';
require_once 'Utils/fonction_gravatar.php';

// Initialisation du message d'opération effectuée
$message = 'Votre commentaire à été enregistrer, en attente de validation';
addFlash($message);

// Attribution de la valeur de GET['billet'] à $num_billet pour que l'ajout de commentaire ne pose pas de problème lors du rechargement de la page.
$num_billet;

if (empty($num_billet)) 
{
	$num_billet = $_GET['billet'];
}

// Conditions pour que l'on ajoute un nouveau commentaires : Besoin d'un contenu, que "les variable SESSION et POST ['token'] soit implémenter et égales" (Toujours incertain sur son 																																								   efficacité)

if (isset($_POST['contenu']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
{
	if ($_SESSION['token'] == $_POST['token'] AND !empty($_POST['contenu']))
	{
		// Ajout d'un nouveau commentaire
		ajout_com($num_billet, $_POST['pseudo'], $_POST['mail'], $_POST['contenu']);
		// Message d'opération effectuée avec succés
		echo getFlash();
	}
	else
	{
		echo "Vous devez au moins mettre un message pour poster un commentaire !";
	}
}

// Avatar par défault pour la fonction gravatar
$default = "http://www.leukeavatars.nl/avatars/pokemon/pokemon_avatars_1.gif";
// Taille du gravatar en pixels
$size=80;
// Récupération du billet sélectionné
$billet = find($_GET['billet']);
// Récupération des commentaires validés du billet sélectionné
$commentaires = find_actif_coms($_GET['billet']);

// Affichage de la page
require_once 'Vue/Vue_blog/vue_commentaires.php';
