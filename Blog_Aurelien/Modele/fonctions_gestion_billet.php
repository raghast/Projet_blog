<?php

    // Fonction pour ajouter un billet

    function ajouter_billet($titre, $contenu, $auteur)
    {
        global $bdd;
        // Préparation de l'insertion d'un nouvel article dans la base de données
        $req = $bdd->prepare('INSERT INTO billets_blog(titre, contenu, auteur, date_creation) VALUES (:titre, :contenu, :auteur, :date_creation)');
        // Attribution des variables utilisées
        $date = new DateTime();
        $result = $date->format('Y-m-d H:i:s');
        $req->bindparam(':titre', $titre, PDO::PARAM_STR);
        $req->bindparam(':contenu', $contenu, PDO::PARAM_STR);
        $req->bindparam(':auteur', $auteur, PDO::PARAM_STR);
        $req->bindparam(':date_creation', $result, PDO::PARAM_STR);
        // Execution de la requête
        $req->execute();         
    }

    function modifier_billet($titre, $contenu, $auteur, $id_billet)
    {
        global $bdd;
        // Préparation de la modification d'un article dans la base de données
        $req = $bdd->prepare('UPDATE billets_blog SET titre = :n_titre, contenu = :n_contenu, auteur = :n_auteur, date_creation = :n_date WHERE id = :id_billet');
        // Attribution des variables utilisées
        $date = new DateTime();
        $result = $date->format('Y-m-d H:i:s');
        $req->bindparam('n_titre', $titre, PDO::PARAM_STR);
        $req->bindparam('n_contenu', $contenu, PDO::PARAM_STR);
        $req->bindparam('n_auteur', $auteur, PDO::PARAM_STR);
        $req->bindparam('n_date', $result, PDO::PARAM_STR);
        $req->bindparam('id_billet', $id_billet, PDO::PARAM_INT);
        // Execution de la requête
        $req->execute();
    }

    function supprimer_billet($id_billet)
    {
        global $bdd;
        // Préparation de la suppression d'un article dans la base de données
        $req = $bdd->prepare('DELETE FROM billets_blog WHERE id = :id_billet');
        // Attribution des variables utilisées
        $req->bindparam('id_billet', $id_billet, PDO::PARAM_INT);
        // Execution de la requête
        $req->execute();
    }

    function check_billet($id_billet)
    {
        global $bdd;
        // Préparation de la récupération d'un article dans la base de données
        $req = $bdd->prepare('SELECT id FROM billets_blog WHERE id = :id_billet');
        $req->bindparam('id_billet', $id_billet, PDO::PARAM_INT);
        // Execution de la requête
        $req->execute();
        // Récupération de l'article pour prouver sa présence
        $resultat = $req->fetch();

        return $resultat;
    }