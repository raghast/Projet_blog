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
          <h2>Liste des commentaires !</h2>
      </header>

      <div class="panel panel-default">
        <div class="panel-body">
          <!-- Affichage du billet sélectionné à l'aide des variables du tableau $billet -->
          <h3>Voici l'article n°<?= $billet['id']?> suivis de ses commentaires :</h3>
          <h4><?= htmlspecialchars($billet['titre'])?></h4>
          <p>Ecrit par : <?= htmlspecialchars($billet['auteur']);?> / Le <em><?= $billet['date_creation_fr']; ?></em></p>
          <p><?= htmlspecialchars($billet['contenu']);?></p> 
        </div>
        <div class="panel-body">
          <h3>Commentaires :</h3>
          <main>  
            <?php
              // Affichage des commentaires du billet sélectionné à l'aide d'une boucle foreach qui récupère les variables dans un tableau $commentaire
              foreach ($commentaires as $commentaire) 
              {
            ?>
            <table class="table">
              <thead>
                <!-- Affichage du gravatar ou de l'avatar par défault -->
                <tr><h4><img src="<?= gravatar(htmlspecialchars($commentaire['email']), $default, $size); ?>" alt="gravatar"> 
                        <?= htmlspecialchars($commentaire['pseudo']); ?></h4></tr>
                <tr>Le <em><?= $commentaire['date_commentaire_fr']; ?></em></tr>
              </thead>
              <tbody>
                <tr><p><?= htmlspecialchars($commentaire['message']);?></p></tr>
                <tr><p>Mail : <?= htmlspecialchars($commentaire['email']);?></p></tr>
              </tbody>
            </table>
            <?php
              }
            ?>
          </main>
        </div>
        <!-- Formulaires pour saisir un nouveau commentaire -->
        <div class="panel-body">
          <form method="POST">
            <div class="form-group">
              <label for="pseudo">Votre pseudo : </label>
              <input type="text" name="pseudo" id="pseudo"></br></br>
            </div>
            <div class="form-group">
              <label for="mail">Votre e-mail : </label>
              <input type="text" name="mail" id="mail"></label></br></br>
            </div>
            <div class="form-group">
              <label for="contenu">Votre message : </label>
              <textarea name="contenu" id="contenu" placeholder="Exp : Il est trop bien ce blog !"></textarea><br/>
            </div>
            <!-- Récupération et envois du token à vérifier (faille CRSF) -->
              <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
              <input type="submit" name="valider" value="valider"></br></br>
          </form>
        <a href="index_frontal.php">Retour à l'acceuil du blog</a>
        </div>       
      </div>
      <footer class="well">
                Tout droits réservés
      </footer>
    </div>
  </body>