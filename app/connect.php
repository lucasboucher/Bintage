<?php
try{
    $db = new PDO('mysql:host=db;dbname=data', 'root', 'password');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e){
    echo 'Erreur = ',$e->getMessage();
    die();
}