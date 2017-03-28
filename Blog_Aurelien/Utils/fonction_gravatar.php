<?php

// Fonction qui affiche soit le gravatar d'une adresse e-mail, s'il y en a un, soit l'avatar par défault définis précédement

function gravatar($email,$default,$size)
{
    $grav_url = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
    return $grav_url;
}