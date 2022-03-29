<?php
// Initialiser la session
session_start();

// Détruire la session. "If" permet de savoir s'il y a une erreur
if(session_destroy())
{
    // Redirection vers l'accueil'
    header("Location: login.php");
}
else {
    echo "Erreur lors de la déconnexion.";
}