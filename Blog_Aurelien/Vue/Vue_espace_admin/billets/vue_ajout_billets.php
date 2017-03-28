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

    <title>Le Blog d'Aurélien ! - Admin - Ajout</title>
  </head>  
  <body>
    <div class="container">
      <header class="jumbotron">
        <h1>Blog d'Aurélien !</h1></br></br>
        <h2>Page d'ajout d'Article</h2>
      </header>
      <div class="panel panel-default">   
        <div class="panel-body">
          <p>Veuillez saisir les informations requise pour votre article :</p>
          <!-- Formulaires pour ajouter un nouvel article -->
  	      <form method="POST">
            <div class="form-group">
    		      <label for="titre">Titre de l'Article :</label>
              <input type="text" name="titre" id="titre"><br/>
            </div>
            <div class="form-group">
    		      <label for="contenu">Votre Article :</label> 
              <textarea name="contenu" id="contenu" placeholder="Exp : Je suis trop cool !"></textarea><br/>
            </div>
            <div class="form-group">
    		      <label for="auteur">Auteur :</label>  
              <input type="text" name="auteur" id="auteur"><br/>
            </div>
              <!-- Envois du token pour la faille CRSF (à vérifier) -->
              <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
    		      <input type="submit" value="Valider" /><br/><br/>
          </form>
          <a href="?controller=espace_admin&&action=sommaire_admin">Retourner au sommaire admin</a><br/><br/>
          <a href="index_frontal.php">Retour à l'acceuil du blog</a>
        </div>   
      </div>
      <footer class="well">
                Tout droits réservés
      </footer>
    </div>
  </body>
</html>