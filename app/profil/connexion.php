<?php

require_once('app/crud/db_connect.php');
$sql = 'SELECT * FROM `user`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('app/crud/db_close.php');

session_start();

$validUser = 'email@example.com';
$validPass = 'password';

if (isset($_POST['email'])
    && isset($_POST['password'])
    && $_POST['email'] === $validUser
    && $_POST['password'] === $validPass) {

    $_SESSION['connect'] = true;
} else {
    $_SESSION['connect'] = false;
}

header('Location: /');

?>