<?php

    // Initialiser la session
    session_start();

    //Redirection si on est pas connecté
    require('check_in_profil.php');
    check_if_connected(true, "no_connected");

    //Message si on est déjà connecté
    if (isset($_GET['already'])) {
        $message_validation = "Vous êtes déjà connecté.";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/LOGO.png">
    <meta charset="utf-8" />
    <title>Compte</title>
    <style type="text/css">
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
        .compte{
            position: relative;
            display: flex;
            width: 1300px;
            height: 700px;
            margin-top: 80px;
            margin-left: auto;
            margin-right: auto;
        }
        .menu{
            position: absolute;
            top: 0;
            left: 0;
            width: 360px;
            height: 550px;

        }
        .deconnecte{
            position: absolute;
            top: 550px;
            left: 0;
            width: 360px;
            height: 250px;
        }
        .button{
            background-color: #A67F75;
            color: white;
            font-size: 24px;
            font-weight: 600;
            border-radius: 10px;
            border-color: #A67F75;
            width: 250px;
            height: 50px;
            margin-left: 55px;
            margin-top: 40px;
        }
        .button_deco{
            background-color: #A67F75;
            color: white;
            font-size: 24px;
            font-weight: 600;
            border-radius: 10px;
            border-color: #A67F75;
            width: 250px;
            height: 50px;
        }
        .espace{
            position: absolute;
            top: 0;
            left: 360px;
            width: 80px;
            height: 600px;
        }
        .choix{
            position: absolute;
            top: 0;
            left: 440px;
            width: 860px;
            height: 700px;
        }
        .section1{
            width: 860px;
            height: 200px;
            background-color: #EAD6CD;
            border-radius: 20px;
            margin-bottom: 30px;
        }
        .part2{
            height: 2px;
            width: 840px;
            margin-top: 30px;
            background-color: #706762;
            margin-left: auto;
            margin-right: auto;
        }
        .nom{
            font-size: 28px;
            color: black;
            font-weight: 600;
            margin-left: 30px;
            margin-right: 200px;
        }
        .nom3{
            font-size: 22px;
            color: #A67F75;
            font-weight: 600;
            margin-left: 415px;
            margin-right: 200px;
        }
        .nom2{
            position: absolute;
            top: 8px;
            left: 0;
            font-size: 28px;
            color: black;
            font-weight: 600;
            margin-left: 30px;
            margin-right: 200px;
        }
        .telechargement{
            padding-top: 35px;
        }
        .part1{
            margin-top: 30px;
        }
        .part4{
            padding-top: 30px;
        }
        .titre1{
            background-color:#E3C7BC;
            border-top: 2px;
            border-left: 2px;
            border-right: 2px;
            width: 400px;
            height: 40px;
            font-size: 24px;
        }
        .nom-file {
            display: none;
        }
        .section2{
            width: 860px;
            height: 300px;
            background-color: #EAD6CD;
            border-radius: 20px;
            margin-bottom: 30px;
        }
        .nom7{
            font-size: 28px;
            color: black;
            font-weight: 600;
            margin-left: 30px;
            margin-right: 321px;
        }
        .nom8{
            font-size: 28px;
            color: black;
            font-weight: 600;
            margin-left: 30px;
            margin-right: 278px;
        }
        .nom9{
            font-size: 28px;
            color: black;
            font-weight: 600;
            margin-left: 30px;
            margin-right: 322px;
        }
        .nom10{
            font-size: 28px;
            color: black;
            font-weight: 600;
            margin-left: 30px;
            margin-right: 400px;
        }
        .message_validation{
            font-size: 20px;
            color: black;
            font-weight: 600;
            text-align: center;
        }
        .section3{
            width: 860px;
            height: 100px;
            background-color: #EAD6CD;
            border-radius: 20px;
            margin-bottom: 30px;
        }
        .part5{
            padding-top: 32px;
        }
        .other{
            width:1.5em;
            height: 1.5em;
        }
    </style>
</head>
<body>
<div class="header1">
    <a href="../index.php"><img src="../assets/LOGO.png" alt="Logo"></a>
</div>
<div>
    <div align="center">
        <table>
            <tr>
                <td><a href="#"><img src="../assets/Rechercher.png" alt="Loupe"></a></td>
                <td><a href="../sale.php"><img src="../assets/Vendre.png" alt="Etiquette"></a></td>
                <td><a href="../chat.html"><img src="../assets/Message.png" alt="Bulle"></a></td>
                <td><a href="../profil/profil.php"><img src="../assets/Compte2.png" alt="Contact"></a></td>
                <td><a href="../cart.html"><img src="../assets/Panier.png" alt="Panier"></a></td>
            </tr>
        </table>
    </div>
    <p class="message_validation"><?php if(isset($message_validation)) { echo $message_validation; } ?></p>
    <div class="compte">
        <div class="menu">
            <img src="../assets/profil.png" alt="profil" >
        </div>
        <div class="deconnecte">
            <a href="logout.php"><button type="button" class="button">Me déconnecter</button></a>
        </div>
        <div class="espace"></div>
        <form method="post">
            <div class="choix">
                <div class="section1">
                    <div class="telechargement">
                        <div class="telechargement2">
                            <p class="nom2">Photo de profil</p>
                            <label for="file" class="nom3">Choisir une photo</label>
                            <input type="file" id="file" name="file" multiple class="nom-file">
                        </div>
                    </div>
                    <div class="part2"></div>
                    <div class="part1">
                        <label for="titre1" class="nom">Nom</label>
                        <input type="text" name="name" id="titre1" class="titre1" value="<?= $res['name'] ?>">
                    </div>
                </div>
                <div class="section2">
                    <div class="part4">
                        <label for="titre1" class="nom7">Adresse</label>
                        <input type="text" name="adress" id="titre1" class="titre1" value="<?= $res['adress'] ?>">
                    </div>
                    <div class="part2"></div>
                    <div class="part1">
                        <label for="titre1" class="nom8">Langues</label>
                        <input type="text" name="titre1" id="titre1" class="titre1" placeholder="Français (French)">
                    </div>
                    <div class="part2"></div>
                    <div class="part1">
                        <label for="titre1" class="nom9">Ville</label>
                        <input type="text" name="titre1" id="titre1" class="titre1" placeholder="Montreuil">
                    </div>
                </div>
                <div class="section3">
                    <div class="part5">
                        <label for="case" class="nom10">Afficher la ville dans le profil</label>
                        <input type="checkbox" name="case" id="case" class="other" >
                    </div>
                </div>
                <input class="button_deco" type="submit">
            </div>
        </form>
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