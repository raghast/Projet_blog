<?php 

  // Condition pour voir la page : être connecté
  if (isConnected())
    {
      // Importation des fonctions pour la modification d'article
      require_once 'Modele/fonctions_gestion_billet.php';
      // Conditions pour modifier un article : Un titre, un contenu, un auteur, un id de billet EXISTANT et encore les variables pour la faille CRSF à vérifier
      if (isset($_POST['titre']) AND isset($_POST['contenu']) AND isset($_POST['auteur']) AND isset($_POST['id_billet']) AND !empty($_SESSION['token']) AND !empty($_POST['token'])) 
      {
          if ($_SESSION['token'] == $_POST['token'] AND !empty($_POST['titre']) AND !empty($_POST['contenu']) AND !empty($_POST['auteur']) AND !empty($_POST['id_billet']) AND !empty(check_billet($_POST['id_billet']))) 
          {
            // Modification d'un article et le message 'succés' associé
            modifier_billet($_POST['titre'], $_POST['contenu'], $_POST['auteur'], $_POST['id_billet']);
            echo getFlash();
          } 
          else
          {
            echo 'Vérifiez que tous les champs soit remplis ! Ou d\'avoir bien séléctionné un numéro d\'article valable';
          }
      }
      // Affichage Vue de la page
      require_once 'Vue/Vue_espace_admin/billets/vue_modification_billets.php';
    }
  else
    {
      echo "Vous devez être connecté pour voir cette partie du site !";
    }

