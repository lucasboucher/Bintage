<?php
//Connection à la bdd
require_once('../db_connect.php');

if (isset($_POST)) {
    if (isset($_POST['name']) && !empty($_POST['name'])) {
        $name = strip_tags($_POST['name']);
        $sql = "UPDATE `user` SET `name`=:name  WHERE `id`=23;"; //TODO Définir ID par session
        $query = $db->prepare($sql);
        $query->bindValue(':name', $name);
        $query->execute();
    }
    if (isset($_POST['adress']) && !empty($_POST['adress'])) {
        $adress = strip_tags($_POST['adress']);
        $sql = "UPDATE `user` SET `adress`=:adress  WHERE `id`=23;"; //TODO Définir ID par session
        $query = $db->prepare($sql);
        $query->bindValue(':adress', $adress);
        $query->execute();
    }
}

require_once('../db_close.php');

?>

<html lang="fr">
<head>
    <title>Votre profil</title>
</head>
<body>
    <h1>Votre profil</h1>
    <form action="page_profil.php" method="post">
        <label>Changer votre nom :
            <input name="name" type="text">
        </label>
        <input type="submit" value="Valider" />
    </form>
    <form action="page_profil.php" method="post">
        <label>Changer votre adresse :
            <input name="adress" type="text">
        </label>
        <input type="submit" value="Valider" />
    </form>
    <form action="disconnect.php">
        <input type="submit" value="Se déconnecter !" />
    </form>
</body>
</html>

