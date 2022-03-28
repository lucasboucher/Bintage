<?php

$pdo = new PDO('mysql:host=db;dbname=data', 'root', 'password');
if (!empty($_POST)):

    $preparedRequest = $pdo->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
    $preparedRequest->bindValue('email', $_POST['email'], PDO::PARAM_STR);
    $preparedRequest->bindValue('password', $_POST['password'], PDO::PARAM_STR);
    $result = $preparedRequest->execute();
    echo $result ? "Votre inscription a fonctionné !" : "Votre inscription n'a pas fonctionné.";

endif;