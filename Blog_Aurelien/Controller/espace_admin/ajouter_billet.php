<?php

  // Condition pour voir la page : être connecté
  if (isConnected())
    {
      // Importation des fonctions pour l'ajout de nouvel articles
      require_once 'Modele/fonctions_gestion_billet.php';
      // Conditions pour ajouter un nouvel article : Un titre, un contenu, un auteur, et encore les variable pour la faille CRSF à vérifier
      if (isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['auteur']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
      {
          if ($_SESSION['token'] == $_POST['token'] AND !empty($_POST['titre']) AND !empty($_POST['contenu']) AND !empty($_POST['auteur'])) 
          {
            // Ajout d'un nouvel article
            ajouter_billet($_POST['titre'], $_POST['contenu'], $_POST['auteur']);
            // Message de succés
            echo getFlash();
          }
          else
          {
            echo 'Vérifiez que tous les champs soit remplis !';
          }
      }
      // Affichage Vue de la page
      require_once 'Vue/Vue_espace_admin/billets/vue_ajout_billets.php';
    }
  else
    {
      echo "Vous devez être connecté pour voir cette partie du site !";
    }
