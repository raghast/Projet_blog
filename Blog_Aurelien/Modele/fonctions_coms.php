<?php

// Fonction qui récupère le billet en fonction de la selection (id) de l'utilisateur

    function find($id)
    {
    	global $bdd;
        // Préparation de la récupération d'un billet dans la base de données
    	$req = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_creation, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM billets_blog WHERE id = :id');
        // Attribution des variables utilisées
    	$req->bindparam(':id', $id, PDO::PARAM_INT);
		$req->execute();
        // Récupération du billet
		$billet = $req->fetch();

	return $billet;
    }

// Fonction qui récupère les commentaires en fonction de l'id du billet et s'ils ont été validés par un admin.

    function find_actif_coms($id)
    {
    	global $bdd;
        // Préparation de la récupération des commentaires validés dans la base de données
    	$req = $bdd->prepare('SELECT pseudo, email, message, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires_blog WHERE id_billet = :id AND actif = 1 ORDER BY date_commentaire');
        // Attribution des variables utilisées
		$req->bindparam(':id', $id, PDO::PARAM_INT);
		$req->execute();
        // Récupération des commentaires dans un tableau
		$commentaires = $req->fetchAll();

	return $commentaires;
    }

// Fonction qui ajoute un nouveau commentaire

    function ajout_com($id_billet, $pseudo, $mail, $contenu)
    {
        global $bdd;
        // Préparation de l'ajoût d'un nouveau commentaire dans la base de données
        $req = $bdd->prepare('INSERT INTO commentaires_blog(id_billet, pseudo, email, message, actif, date_commentaire) VALUES (:id_billet, :pseudo, :email, :message, :actif,  :date_commentaire)');
        // Attribution des variables utilisées
        $date = new DateTime();
        $result = $date->format('Y-m-d H:i:s');
        $actif = 0;
        $req->bindparam(':id_billet', $id_billet, PDO::PARAM_INT);
        $req->bindparam(':pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindparam(':email', $mail, PDO::PARAM_STR);
        $req->bindparam(':message', $contenu, PDO::PARAM_STR);
        $req->bindparam(':actif', $actif, PDO::PARAM_INT);
        $req->bindparam(':date_commentaire', $result, PDO::PARAM_STR);
        $req->execute();         
    }
