<?php
session_start();
require('check.php');
check_if_connected(false, "already");

if (isset($_GET['email_no_exist'])) {
    $message_redirection = "Cet e-mail n'est pas inscrit.";
}

require('../db_connect.php');

//Vérification email identique
if (isset($_REQUEST['email'])) {
    $email = stripslashes($_REQUEST['email']);
    $sql = "SELECT `email` FROM `user` WHERE `email`=:email;";
    $query = $db->prepare($sql);
    $query->bindValue(':email', $email);
    $query->execute();
    $res = $query->fetch();
    if ($res == true) {
        check_if_connected(true, "email_exists");
    } else {
        $new_email = true;
    }
}



if (isset($_REQUEST['email'], $_REQUEST['password']) && $new_email == true){
    $email = stripslashes($_REQUEST['email']);
    $password = password_hash(stripslashes($_REQUEST['password']), PASSWORD_DEFAULT);
    $sql = "INSERT INTO `user` (`email`, `password`) VALUES (:email, :password);";
    $query = $db->prepare($sql);
    $query->bindValue(':email', $email);
    $query->bindValue(':password', $password);
    $res = $query->execute();
    if($res) {
        header("Location: login.php?register_success");
    }
}

//Déconnexion de la base de données
require_once('../db_close.php');

?>
<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    <style>
        body{
            height: 100vh;
            width: 100%;
            background-image: url("../assets/Fond.png");
        }
        .Taille{
            width: 432px;
            height: 601px;
            background-color: #FFF8F7;
        }
        .Logo{
            margin-top: 20px;
            margin-bottom: 40px;
        }
        input{
            width: 300px;
            height: 40px;
            background-color: hsla(12, 22%, 55%, 0.281);
            border: none;
            border-radius: 18px;

        }
        input::placeholder {
            color: rgba(0, 0, 0, 0.336);
            opacity: 1;
            font-size: 18px;

        }
        .beau{
            margin-bottom: 15px;
        }
        a{
            color: black;
            text-decoration: none;
        }
        .autre{
            width: 300px;
            text-align: right;
            margin-top: 10px;
        }
        .button1{
            width: 300px;
            height: 40px;
            background-color: #FFF8F7;
            border-color: #C7ACA5;
            border-radius: 18px;
            font-size: 20px;
            margin-top: 30px;
        }
        .button2{
            width: 300px;
            height: 40px;
            background-color: #A67F75;
            border-color: #A67F75;
            border-radius: 18px;
            font-size: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            color: white;

        }
        .other{
            padding-top: 90px;
        }

    </style>
</head>
<body>
<div class="other">
    <table align="center">
        <tr>
            <td>
                <div>
                    <img src="../assets/ImageInscription.png" alt="Decoration">
                </div>
            </td>
            <td>
                <div class="Taille" align="center">
                    <div>
                        <a href="../index.html"><img src="../assets/LOGO.png" alt="Logo" class="Logo"></a>
                    </div>
                    <?php if (!empty($message_redirection)) { echo $message_redirection; } ?>
                    <form action="" method="post" name="login">
                        <div>
                            <input type="email" name="email" placeholder="    Adresse mail" class="beau" required>
                        </div>
                        <div>
                            <input type="password" name="password" placeholder="    Mot de passe" required >
                        </div>

                        <div class="autre" >
                            <a href="#">Mot de passe oublié ?</a>
                        </div>
                        <div class="autre" >
                            <?php if (!empty($message_register_success)) { echo $message_register_success; } ?>
                        </div>
                        <div>
                            <button type="submit" name="submit" class="button1">INSCRIPTION</button>
                        </div>
                        <div>
                            <a href="login.php"><button type="button" class="button2">OU SE CONNECTER</button></a>
                        </div>
                        <div>
                            <a href="#">Ou inscrivez-vous avec </a>
                        </div>
                    </form>
                    <div>
                        <table>
                            <tr>
                                <td><a href="https://www.google.fr/"><img src="../assets/google%60.png" alt="google"></a></td>
                                <td><a href="https://fr-fr.facebook.com/"><img src="../assets/facebook.png" alt="facebook"></a></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </td>
        </tr>
    </table>
</div>
</body>
</html>