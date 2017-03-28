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
          <h2>Page de modération de commentaires</h2>
      </header>
      <!-- Affichage de l'article sélectionné à l'aide des variables du tableau $billet -->
      <div class="panel panel-default">      
        <div class="panel-body">
          <h3>Voici l'article séléctionné :</h3>
          <h4><?= htmlspecialchars($billet['titre'])?></h4>
          Le <em><?= $billet['date_creation_fr']; ?></em>
          <p><?= htmlspecialchars($billet['contenu']);?></p>
          <p>Ecrit par : <?= htmlspecialchars($billet['auteur']);?></p>  
        </div>
        <div class="panel-body">
          <h3> Et voici ses commentaires à valider ou supprimer :</h3>
          <main>
            <?php
              // Affichage des commentaires de l'article sélectionné à l'aide d'une boucle foreach qui récupère les variables dans un tableau $commentaire
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
                <!-- Formulaires pour valider ou supprimer le commentaire -->   
                <tr><form method="POST">
                      <div class="form-group">
                        <label for="choix">Action sur le commentaire :</label>
                        <select name="choix" id="choix">
                          <option value="valid">Validez le commentaire</option>
                          <option value="delete">Supprimer le commentaire</option>
                        </select>  
                      </div>
                        <!-- Envois de l'id du commentaire pour effectuer l'opération sur le bon -->
                        <input type="hidden" name="id_com" value="<?= htmlspecialchars($commentaire['id']); ?>"/>
                        <!-- Récupération et envois du token à vérifier (faille CRSF) -->
                        <input type="hidden" name="token" id="token" value="<?= $_SESSION['token']; ?>" />
                        <input type="submit" name="valider" value="Valider !"><br/><br/>
                    </form></tr>
              </tbody>
            </table>
            <?php
              }
            ?>
          </main>
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