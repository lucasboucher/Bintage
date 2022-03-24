<!doctype html>
<html lang="fr">
<head>
    <title>Projet Full stack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <h1>Accueil</h1>

    <a href="inscription.php">Page d'inscription</a><br>
    <a href="connexion.php">Page de connexion</a><br>
    <a href="listing.php">Accès au CRUD des utilisateurs</a>
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
