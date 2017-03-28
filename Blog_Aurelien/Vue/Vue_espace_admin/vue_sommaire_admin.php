<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!-- Latest compiled and minified CSS -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

    <!-- Optional theme -->
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">

    <title>Le Blog d'Aurélien !</title>
  </head>
  <body>
    <div class="container">
      <header class="jumbotron">
          <h1>Blog d'Aurélien !</h1></br></br>
          <h2>Sommaire de l'espace d'administrateur !</h2>
      </header>

      <div class="panel panel-default"> 
        <div class="panel-body">
          <p>Bienvenue sur l'interface d'administrateur de ce blog ! Il y a plusieurs fonctionnalités disponibles :<br/></p>
          <p>1 - Valider ou supprimer les commentaires des différents articles via le premier lien<br/>
          2 - Ajouter un article via le 2ème lien<br/>
          3 - Modifier un article via le 3ème lien<br/>
          4 - Ou supprimer un article via le 4ème lien<br/><br/>
          Merci de respecter le travail d'autrui !<br/><br/></p>
          <!-- Formulaire pour saisir un article et ses commentaires à modérer -->
  	      <form method="POST" action="?controller=espace_admin&&action=moderation_coms">
            <div class="form-group">
			        <label for="id_billet">1 - Veuillez saisir le numéro de l'article que vous souhaitez modérer :</label>
              <input type="text" name="id_billet" id="id_billet">
              <!-- Envois du token pour la faille CRSF (à vérifier) -->
              <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
     	        <input type="submit" name="valider" id="valider" value="valider"><br/><br/>
            </div>
          </form>
          <!-- Liens vers les différentes actions sur les articles -->
          <p>2 - <a href="?controller=espace_admin&&action=ajouter_billet">Ajouter un article</a></p>
          <p>3 - <a href="?controller=espace_admin&&action=modifier_billet">Modifier un article</a></p>
          <p>4 - <a href="?controller=espace_admin&&action=supprimer_billet">Supprimer un article</a></p>
          <!-- Formulaire de déconnection -->
          <form method="POST" action="?controller=espace_admin&&action=connection_admin">
            <div class="form-group">
              <label for="deco">Se déconnecter !</label>
              <input type="checkbox"" name="deco" id="deco">
              <input type="submit" name="disconnect" id="disconnect" value="Valider !"><br/><br/>
            </div>
          </form>
          <a href="index_frontal.php">Retour à l'acceuil du blog</a>
        </div>
      </div>  
      <footer class="well">
                Tout droits réservés
      </footer>
    </div>    
  </body>
</html>