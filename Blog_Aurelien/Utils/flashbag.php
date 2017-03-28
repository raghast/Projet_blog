<?php

// Fonction d'attribution du message 'succés' à la variable SESSION['flashbag']

function addFlash($message) 
{	
    $_SESSION['flashbag'] = $message;
}

// Fonction qui renvois le message 'succés'

function getFlash() 
{
    return ($_SESSION['flashbag']);
}