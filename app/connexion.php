<!doctype html>
<html lang="fr">
<head>
    <title>Projet Full stack</title>
</head>
<body>
<h1>Connexion</h1>

<form method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="example@webmail.com"><br/>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Votre mot de passe..."><br/>
    <button type="submit">Se connecter</button>
</form>
</body>

<?php

$pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');

?>

</html>