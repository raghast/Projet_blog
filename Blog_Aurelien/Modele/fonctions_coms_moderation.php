<?php

// Fonction qui affiche les commentaires à gérer (pour l'administrateur)

    function moderation_coms($id)
    {
        global $bdd;
        // Préparation de la récupération des commentaires d'un article dans la base de données
        $req = $bdd->prepare('SELECT id, pseudo, email, message, DATE_FORMAT(date_commentaire, \'%d/%m/%Y à %Hh%imin%ss\') AS date_commentaire_fr FROM commentaires_blog WHERE id_billet = :id ORDER BY date_commentaire');
        // Attribution des variables utilisées
        $req->bindparam(':id', $id, PDO::PARAM_INT);
        $req->execute();
        // Récupération des commentaires dans un tableau
        $commentaires = $req->fetchAll();

    return $commentaires;
    }

// Fonction qui valide un commentaire

    function valid_com($id)
    {
        global $bdd;
        // Préparation de la validation d'un commentaire dans la base de données
        $req = $bdd->prepare('UPDATE commentaires_blog SET actif = 1 WHERE id = :id');
        // Attribution des variables utilisées
        $req->bindparam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

// Fonction qui supprime un commentaire

    function delete_com($id)
    {
        global $bdd;
        // Préparation de la suppression d'un commentaire dans la base de données
        $req = $bdd->prepare('DELETE FROM commentaires_blog WHERE id = :id');
        // Attribution des variables utilisées
        $req->bindparam(':id', $id, PDO::PARAM_INT);
        $req->execute();
    }

