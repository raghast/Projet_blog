<?php
	
	// Fonction qui compte les billets

	function compte_billets()
	{
		global $bdd;
		// Préparation de la récupération du nombre d'articles dans la base de données
		$req = $bdd->prepare('SELECT COUNT(*) AS nb_billets FROM billets_blog');
		$req -> execute();
		// Récupération du nombres d'articles dans une variable
		$donnee = $req->fetch();

	return $donnee['nb_billets'];
	}


	// Fonction qui récupère l'ensemble des billets

	function findAll($debut_page)
	{
	  global $bdd;
	  // Préparation de la récupération des billets dans la base de données
      $req = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets_blog ORDER BY date_creation_fr DESC LIMIT :debut_page, 5');
      // Attribution des variables utilisées
      $req->bindparam(':debut_page', $debut_page, PDO::PARAM_INT);
      $req->execute();
      // Récupération des billets dans un tableau
      $billets = $req->fetchAll();

    return $billets;
    }