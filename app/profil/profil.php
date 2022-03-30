<?php

    // Initialiser la session
    session_start();

    //Redirection si on est pas connecté
    require('check.php');
    check_if_connected(true, "no_connected");

    //Message si on est déjà connecté
    if (isset($_GET['already'])) {
        echo "Vous êtes déjà connecté.";
    }

    //Connexion à la base de données
    require_once('../db_connect.php');

    //Changer les informations avec le formulaire
    if (isset($_POST)) {
        if (isset($_SESSION['email']) && !empty($_SESSION['email'])
            && isset($_POST['name']) && !empty($_POST['name'])
            && isset($_POST['adress']) && !empty($_POST['adress'])) {
            $email = strip_tags($_SESSION['email']);
            $name = strip_tags($_POST['name']);
            $adress = strip_tags($_POST['adress']);
            $sql = "UPDATE `user` SET `name`=:name, `adress`=:adress WHERE `email`=:email;";
            $query = $db->prepare($sql);
            $query->bindValue(':name', $name);
            $query->bindValue(':adress', $adress);
            $query->bindValue(':email', $email);
            $query->execute();
            $message_validation = "Le compte a bien été modifié !";
        }
    }

    //Récupérer les données de l'utilisateur pour le mettre dans la valuer des entrées du formulaire
    if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
        $email = strip_tags($_SESSION['email']);
        $sql = "SELECT * FROM `user` WHERE `email`=:email;";
        $query = $db->prepare($sql);
        $query->bindValue(':email', $email);
        $query->execute();
        $res = $query->fetch();
    }

    //Déconnexion de la base de données
    require_once('../db_close.php');

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Votre profil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <h1>Bienvenue <?php echo $_SESSION['email']; ?> !</h1>
        <p>C'est votre tableau de bord.</p>
        <form method="post">
            <label>Mon nom :
                <input type="text" name="name" value="<?= $res['name'] ?>">
            </label><br>
            <label>Mon adresse :
                <input type="text" name="adress" value="<?= $res['adress'] ?>">
            </label><br>
            <input type="submit">
        </form><br>
        <a href="logout.php">Déconnexion</a><br>
        <?php if(isset($message_validation)) { echo $message_validation; } ?>

    </body>
</html>