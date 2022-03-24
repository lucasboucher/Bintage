<?php

require_once('connect.php');

if (isset($_POST)) {

    if (isset($_POST['email']) && !empty($_POST['email'])
        && isset($_POST['password']) && !empty($_POST['password'])
        && isset($_POST['name']) && !empty($_POST['name'])
        && isset($_POST['admin']) && !empty($_POST['admin'])
        && isset($_POST['adress']) && !empty($_POST['adress'])) {

        $email = strip_tags($_POST['email']);
        $password = strip_tags($_POST['password']);
        $name = strip_tags($_POST['name']);
        $admin = strip_tags($_POST['admin']);
        $adress = strip_tags($_POST['adress']);

        $sql = "INSERT INTO `user` (`email`, `password`, `name`, `admin`, `adress`) VALUES (:email, :password, :name, :admin, :adress);";
        $query = $db->prepare($sql);

        $query->bindValue(':email', $email, PDO::PARAM_STR);
        $query->bindValue(':password', $password, PDO::PARAM_STR);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':admin', $admin, PDO::PARAM_INT);
        $query->bindValue(':adress', $adress, PDO::PARAM_STR);
        $query->execute();

        header('Location: read.php');

    }

}

require_once('close.php');

?>

<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container">
        <h1>Création d'un utilisateur</h1>
        <form method="post">
            <p>
                <label for="email">Email</label>
                <input type="email" name="email" id="email">
            </p>
            <p>
                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password">
            </p>
            <p>
                <label for="name">Nom</label>
                <input type="text" name="name" id="name">
            </p>
            <p>
                <label for="admin">Administrateur</label>
                <input type="number" name="admin" id="admin">
            </p>
            <p>
                <label for="adress">Adresse</label>
                <input type="text" name="adress" id="adress">
            </p>
            <button>Ajouter</button>
        </form>
    </div>
</body>

</html>