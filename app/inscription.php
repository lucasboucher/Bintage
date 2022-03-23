<!doctype html>
<html lang="fr">
<head>
    <title>Projet Full stack</title>
</head>
<body>
<h1>Inscription</h1>

<form method="post">
    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" placeholder="example@webmail.com"><br/>
    <label for="password">Mot de passe</label>
    <input type="password" name="password" id="password" placeholder="Votre mot de passe..."><br/>
    <button type="submit">S'inscrire</button>
</form>
</body>

<?php

$pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');
if (!empty($_POST)):

    $preparedRequest = $pdo->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
    $preparedRequest->bindValue('email', $_POST['email'], PDO::PARAM_STR);
    $preparedRequest->bindValue('password', $_POST['password'], PDO::PARAM_STR);
    $result = $preparedRequest->execute();
    echo $result ? "Votre inscription a fonctionné !" : "Votre inscription n'a pas fonctionné.";

endif;

?>

</html>