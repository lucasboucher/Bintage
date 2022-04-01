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

<html lang="fr">
<head>
    <meta charset="utf-8" />
    <title>Compte</title>
    <style>
        body{
            background-color: #FFF8F7;
        }
        div.header1{
            width: 253px;
            margin: 50px auto 40px;
        }

        tr{
            height: 50px;
        }
        td{
            padding-left: 30px;
        }
        .ligne{
            height: 2px;
            width: 1100px;
            background-color: #706762;
            margin-top: 110px;
            margin-left: auto;
            margin-right: auto;
        }
        .footer{
            margin-top: 30px;
            margin-bottom: 50px;
        }
        h2{
            font-size: 24px;
            color: rgba(0, 0, 0, 0.534);
        }
        .other{
            margin-top: 110px;
        }
    </style>
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

<div class="header1">
    <a href="../index.html"><img src="../assets/LOGO.png" alt="Logo"></a>
</div>
<div>
    <div align="center">
        <table>
            <tr>
                <td><a href="#"><img src="../assets/Rechercher.png" alt="Loupe"></a></td>
                <td><a href="../sale.html"><img src="../assets/Vendre.png" alt="Etiquette"></a></td>
                <td><a href="../chat.html"><img src="../assets/Message.png" alt="Bulle"></a></td>
                <td><a href="login.php"><img src="../assets/Compte2.png" alt="Contact"></a></td>
                <td><a href="../cart.html"><img src="../assets/Panier.png" alt="Panier"></a></td>
            </tr>
        </table>
    </div>
    <div align="center" class="other">
        <img src="../assets/ComptePage.png" alt="Vendre">

    </div>

</div>
<div  class="ligne"> </div>
<div align="center">
    <table class="footer">
        <tr class="footer1">
            <td class="footer2"><h2>Politique de Confidentialité</h2></td>
            <td class="footer2"><h2>Politique de cookies</h2></td>
            <td class="footer2"><h2>Paramètres des cookies</h2></td>
            <td class="footer2"><h2>Termes et Conditions</h2></td>
        </tr>
        <tr class="footer">
            <td class="footer2"><h2>Conditions d'utilisation Pro</h2></td>
            <td class="footer2"><h2>Notre plateforme</h2></td>
            <td class="footer2"><h2>Conditions de vente Pro</h2></td>
        </tr>
    </table>
</div>
</body>
</html>