<?php

//Vérification si utilisateur connecté sinon retour à l'accueil
require_once('check_if_connected.php');
if (check_if_connected() == true) {
    header('Location: /index.php');
}

//Recherche si email identique
if (!empty($_POST)) {
    //Connexion à la bdd, récupération des emails, fermeture de la bdd
    require_once('../db_connect.php');
    $sql = 'SELECT `email` FROM `user`';
    $query = $db->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    require_once('../db_close.php');

    //Comparaison avec les emails et le POST
    $value = 0;
    foreach($result as $user) {
        if ($_POST['email'] == $result[$value]['email']) {
            header('Location: /profil/page_connexion.php');
            break;
        }
        $value = $value + 1;
    }
}

//Connection à la bdd
require_once('../db_connect.php');

//Inscription du nouvel utilisateur dans la bdd
if (!empty($_POST)) {
    $preparedRequest = $db->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
    $preparedRequest->bindValue('email', $_POST['email']);
    $preparedRequest->bindValue('password', $_POST['password']);
    $result = $preparedRequest->execute();
    header('Location: /');
}

//TODO Est-ce qu'il faut fermer la connexion à la bdd ici ?