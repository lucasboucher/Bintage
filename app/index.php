<!doctype html>
<html lang="fr">
<head>
    <title>Projet Full stack</title>
</head>
<body>
    <h1>Accueil</h1>

    <a href="inscription.php">Page d'inscription</a><br>
    <a href="connexion.php">Page de connexion</a>
</body>

<?php

    $pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');


?>

</html>

<!--
TODO Faire en sorte de ne pas créer deux comptes
TODO Hacher les mots de passe
TODO Faire la connexion avec le dehachage
TODO Remplir son compte utilisateur
