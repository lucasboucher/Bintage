<?php

require_once('connect.php');

if (isset($_POST)) {

    if (isset($_POST['id']) && !empty($_POST['id'])

        && isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['admin'])
        && isset($_POST['adress']) && !empty($_POST['adress'])) {

        $id = strip_tags($_GET['id']);
        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $name = strip_tags($_POST['name']);
        $admin = strip_tags($_POST['admin']);
        $adress = strip_tags($_POST['adress']);

        $sql = "UPDATE `user` SET `email`=:email, `password`=:password, `name`=:name, `admin`=:admin, `adress`=:adress WHERE `id`=:id;";
        $query = $db->prepare($sql);
        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':admin', $admin, PDO::PARAM_INT);
        $query->bindValue(':adress', $adress, PDO::PARAM_STR);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();

        header('Location: read.php');

    }

}


if (isset($_GET['id']) && !empty($_GET['id'])) {

    $id = strip_tags($_GET['id']);

    $sql = "SELECT * FROM `user` WHERE `id`=:id;";

    $query = $db->prepare($sql);

    $query->bindValue(':id', $id, PDO::PARAM_INT);

    $query->execute();

    $result = $query->fetch();

}

require_once('close.php');

?>

<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>

<body>

    <h1>Modifier un utilisateur</h1>

    <form method="post">

        <p>

            <label for="email">Email</label>

            <input type="email" name="email" id="email" value="<?= $result['email'] ?>">

        </p>

        <p>

            <label for="password">Mot de passe</label>

            <input type="password" name="password" id="password" value="<?= $result['password'] ?>">

        </p>

        <p>

            <label for="name">Nom</label>

            <input type="text" name="name" id="name" value="<?= $result['name'] ?>">

        </p>

        <p>

            <label for="admin">Administrateur</label>

            <input type="number" name="admin" id="admin" value="<?= $result['admin'] ?>">

        </p>

        <p>

            <label for="adress">Adresse</label>

            <input type="text" name="adress" id="adress" value="<?= $result['adress'] ?>">

        </p>

        <p>

            <button>Enregistrer</button>

        </p>

        <input type="hidden" name="id" value="<?= $result['id'] ?>">

    </form>

</body>

</html>