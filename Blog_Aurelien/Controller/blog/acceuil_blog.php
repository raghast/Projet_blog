<?php
// Importations des fonctions qui nous servent pour la page acceuil_blog
require_once 'Modele/fonctions_billets.php';

// Calcul du nombres d'articles total et le nombre de pages qui en découle pour l'affichage de la pagination
$nb_billets = compte_billets();
$nb_page = ceil($nb_billets / 5);

// Initialisation de la variable début page pour savoir quels articles afficher
if (!empty($_GET['page'])) 
{
	$debut_page = ($_GET['page'] - 1) * 5;
}
else
{
	$debut_page = 0;
}

// Récupération des billets
$billets = findAll($debut_page);

// Vue de la page
require_once 'Vue/Vue_blog/vue_billets.php';
