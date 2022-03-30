<?php
    session_start();

    require('check.php');
    check_if_connected(false, "already");

    if (isset($_GET['no_connected'])) {
        $message_redirection = "Vous n'êtes pas connecté.";
    }

    if (isset($_GET['email_exists'])) {
        $message_redirection = "Cet e-mail existe déjà ! Veuillez vous connecter.";
    }

    require('../db_connect.php');
    if (isset($_POST['email'])) {
        $email = stripslashes($_REQUEST['email']);
        $password = stripslashes($_REQUEST['password']);
        $sql = "SELECT * FROM `user` WHERE `email`=:email";
        $query = $db->prepare($sql);
        $query->bindValue(':email', $email);
        $res = $query->execute();
        $res = $query->fetch();
        $rows = $query->rowCount();
        if ($rows == 1) {
            if(password_verify($password, $res['password'])) {
                $_SESSION['email'] = $email;
                header("Location: /");
            }
            else
            {
                $message_error = "Erreur de mot de passe.";
            }
        }
        else {
            header("Location: register.php?email_no_exist");
        }
    }
?>
<html lang="fr">
<head>
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
    <?php if (!empty($message_redirection)) { ?>
        <p><?= $message_redirection ?></p>
    <?php } ?>
    <form action="" method="post" name="login">
        <h1>Connexion</h1>
        <label>Votre e-mail :
            <input type="email" name="email" placeholder="email@exemple.com" required>
        </label><br><br>
        <label>Votre mot de passe :
            <input type="password" name="password" placeholder="password" required>
        </label><br><br>
        <input type="submit" value="Connexion " name="submit"><br><br>
        <p>Vous êtes nouveau ici ? <a href="register.php">S'inscrire</a> !</p>
        <?php if (!empty($message_error)) { ?>
            <p><?= $message_error ?></p>
        <?php } ?>
    </form>
</body>
</html>