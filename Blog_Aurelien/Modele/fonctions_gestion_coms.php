<?php

	function find_coms_all($id)
    {
    	global $bdd;
    	// Préparation de la récupération des commentaires d'un article dans la base de données
    	$req = $bdd->prepare('SELECT pseudo, email, message, date_commentaire FROM commentaires_blog WHERE id_billet = :id ORDER BY date_commentaire');
		// Attribution des variables utilisées
		$req->bindparam(':id', $id, PDO::PARAM_INT);
		$req->execute();
		// Récupération des commentaires dans un tableau
		$commentaires = $req->fetchAll();

	return $commentaires;
    }
