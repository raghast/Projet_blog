<?php 

  // Condition pour voir la page : être connecté
  if (isConnected())
    {
      // Importation des fonctions pour la suppression d'article
      require_once 'Modele/fonctions_gestion_billet.php';
      // Conditions pour supprimer un article : Un titre, un contenu, un auteur, un id de billet EXISTANT et encore les variables pour la faille CRSF à vérifier
      if (!empty($_POST['id_billet']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
      {
        if ($_SESSION['token'] == $_POST['token'] AND !empty($_POST['id_billet']) AND !empty(check_billet($_POST['id_billet']))) 
        {
          // Suppression d'un article et le message 'succés' associé
          supprimer_billet($_POST['id_billet']);
          echo getFlash();
        }
        else
        {
          echo 'Vérifiez d\'avoir bien mis un numéro d\'article valable !';
        }
      }
      // Affichage Vue de la page
      require_once 'Vue/Vue_espace_admin/billets/vue_suppression_billets.php';
    }
  else
    {
      echo "Vous devez être connecté pour voir cette partie du site !";
    }
