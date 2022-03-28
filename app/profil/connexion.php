<?php

session_start();

require_once('../db_connect.php');
$sql = 'SELECT `email` FROM `user`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('../db_close.php');

$value = 0;
foreach($result as $user) {
    echo $result[$value]['email'];
    $value = $value + 1;
    echo '<br>';
}

//header('Location: /');