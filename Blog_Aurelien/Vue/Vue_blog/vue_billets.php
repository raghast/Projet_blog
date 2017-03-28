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
          <h2>Liste des Articles</h2>
      </header>

      <aside>
          <p>Interface de connection à l'espace admin : <a href="?controller=espace_admin&&action=connection_admin">Ici</a></p>
      </aside>

      <div class="panel panel-default">
        <div class="panel-body">
        <h2>Bienvenue sur mon blog !</h2>
        <p>Je m'appelle Aurélien Bardy et je fais ce blog uniquement pour apprendre le PHP.</p>
        <p>Je n'ai aucun intérets à raconter ma vie sur ce blog mais j'aime programmer !</p></br>
        <p>Voici les derniers articles ajoutés sur mon blog, c'est super intéressant xD :</p>
        <main>
        <?php
          // Affichage des billets grâce à une boucle foreach
          foreach ($billets as $billet) 
          {
        ?>
            <table class="table">
              <thead>
                <tr><h3>Article n°<?= $billet['id']?> : <?= htmlspecialchars($billet['titre'])?></h3></tr>
                <tr>Ecrit par : <?= htmlspecialchars($billet['auteur']);?>, le <em><?= $billet['date_creation_fr']; ?></em></tr><br/><br/>
              </thead>
              <tbody>
                <tr><?= htmlspecialchars($billet['contenu']);?></tr><br/><br/>
                <tr><a href="?controller=blog&&action=commentaires&&billet= <?= $billet['id']; ?>">Commentaires</a></tr>
              </tbody>
            </table>
        <?php
          }
        ?>
        </main>
        <p>Pagination : 
        <?php 
          for ($i=1; $i <= $nb_page; $i++) 
          {
        ?>
        <a href="?page=<?= $i; ?>"><?= $i; ?></a> 
        <?php
          } 
        ?>  
        </p>
        </div>
      </div>
      <footer class="well">
                Tout droits réservés
      </footer>
  </div>
  </body>