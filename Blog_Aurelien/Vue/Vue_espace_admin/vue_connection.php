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

        <title>Page de connection</title>
    </head>
    <body>

      <div class="container">
        <header class="jumbotron">
          <h1>Blog d'Aurélien !</h1></br></br>
          <h2>Page de connection Administrateur</h2>
        </header>

        <div class="panel panel-default">    
          <div class="panel-body">
            <p>Veuillez rentrer votre identifiant et votre mot de passe pour vous connecter :</p>
            <!-- Formulaire pour se connecter à l'espace admin -->
            <form method="POST">
              <div class="form-group">
                <label for="login">Votre Identifiant : </label>
                <input type="text" name="login" id="login"></br></br>
              </div>
              <div class="form-group">
                <label for="mail">Votre mot de passe : </label>
                <input type="password" name="password" id="password"></br></br>
              </div>
                <!-- Envois du token pour la faille CRSF (à vérifier) -->
                <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
                <input type="submit" name="connection" value="se connecter"></br></br>
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