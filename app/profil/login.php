<?php

session_start();

require_once('../db_connect.php');
$sql = 'SELECT `email` FROM `user`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('../db_close.php');

$value = 0;
$_SESSION['connect'] = false;

foreach($result as $user) {
    if ($_POST['email'] == $result[$value]['email']) {
        $_SESSION['connect'] = true;
        header('Location: /');
        break;
    }
    $value = $value + 1;
}