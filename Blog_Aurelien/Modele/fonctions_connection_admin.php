<?php

// Fonction pour se connecter à l'espace admin

function first_connection($login, $password)
{
		global $bdd;

		// Hachage du mot de passe
		$pass_hache = sha1($password);

		// Vérification des identifiants
		$req = $bdd->prepare('SELECT id FROM logs_admin WHERE login = :login AND password = :password');
		$req->bindparam(':login', $login, PDO::PARAM_STR);
        $req->bindparam(':password', $pass_hache, PDO::PARAM_STR);
		$req->execute();
		$resultat = $req->fetch();
		$valid = false;
		// Si la variable $resultat est implémentée, alors il éxiste un administrateur avec ces identifiants
		if (!empty($resultat))
			{$valid=true;}
				
		if ($valid)
		{
			// Affectation de la variable SESSION['user'] utilisée dans la fonction isConnected
   			$_SESSION['user'] = $login;
			header('Location: ?controller=espace_admin&&action=sommaire_admin');
		}
		else
		{
		echo 'Mauvais identifiant ou mot de passe !</br></br>';
	    }
}

// Fonction qui vérifie si l'utilisateur est connecté

function isConnected () {
    return (!empty($_SESSION['user']));
}

// Fonction qui déconnecte l'utilisateur

function disconnect() {
    unset($_SESSION['user']);
}