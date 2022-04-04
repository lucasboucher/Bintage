<?php
session_start();

require('check.php');
check_if_connected(true, "no_connected");

require_once('db_connect.php');

if (isset($_POST)) {
    if (isset($_POST['title']) && !empty($_POST['title'])
    && isset($_POST['description']) && !empty($_POST['description'])
    && isset($_POST['category']) && !empty($_POST['category'])
    && isset($_POST['brand']) && !empty($_POST['brand'])
    && isset($_POST['state']) && !empty($_POST['state'])
    && isset($_POST['price']) && !empty($_POST['price'])) {
        $title = strip_tags($_POST['title']);
        $description = strip_tags($_POST['description']);
        $category = strip_tags($_POST['category']);
        $brand = strip_tags($_POST['brand']);
        $state = strip_tags($_POST['state']);
        $price = strip_tags($_POST['price']);
        $sql = "INSERT INTO `sale` (`title`, `description`, `category`, `brand`, `state`, `price`) VALUES (:title, :description, :category, :brand, :state, :price);";
        $query = $db->prepare($sql);
        $query->bindValue(':title', $title);
        $query->bindValue(':description', $description);
        $query->bindValue(':category', $category);
        $query->bindValue(':brand', $brand);
        $query->bindValue(':state', $state);
        $query->bindValue(':price', $price);
        $query->execute();
    }
}

require_once('db_close.php');

?>

<html lang="fr">
<head>
    <link rel="icon" type="image/png" sizes="16x16" href="assets/LOGO.png">
    <meta charset="utf-8" />
    <title>Vendre</title>
    <style>
        body{
            background-color: #FFF8F7;
        }
        div.header1{
            width: 253px;
            margin: 50px auto 40px;
        }
        h1{
            font-family: Montserrat,serif;
            font-style: normal;
            padding-top: 80px;
            padding-bottom: 35px;
            font-size: 48px;
            padding-left: 185px;
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
            margin-top: 60px;
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
        .photo{
            background-color: #E3C7BC;
            height: 350px;
            margin-left: 100px;
            margin-right: 100px;
            border-radius: 20px;
            margin-bottom: 80px;
        }
        .titre{
            color: rgba(0, 0, 0, 0.527);
            font-size: 28px;
            padding-top: 50px;
            padding-left: 50px;
        }
        .telechargement{
            background-color: #EAD6CD;
            height: 180px;
            margin-left: 50px;
            margin-right: 50px;
            border-radius: 20px;
            border-style: dashed;
            border-color: #6A504A;
        }
        .telechargement2{
            padding-top: 65px;
        }
        .nom{
            font-size: 32px;
            color: #A67F75;
            font-weight: 600;
            cursor: pointer;
        }
        .nom-file {
            display: none;
        }
        .section2{
            background-color: #E3C7BC;
            height: 350px;
            margin-left: 100px;
            margin-right: 100px;
            border-radius: 20px;
            margin-bottom: 80px;
        }
        .part1{
            padding-left: 50px;
            padding-top: 70px;
        }
        .objet{
            font-size: 30px;
            color: black;
            padding-right: 500px;
        }
        .titre1{
            background-color:#E3C7BC;
            border-top: 2px;
            border-left: 2px;
            border-right: 2px;
            width: 500px;
            height: 40px;
            font-size: 24px;
        }
        .part2{
            height: 2px;
            width: 1150px;
            background-color: #706762;
            margin-top: 60px;
            margin-left: auto;
            margin-right: auto;
        }
        .objet2{
            font-size: 30px;
            color: black;
            padding-right: 350px;
        }
        .section3{
            background-color: #E3C7BC;
            height: 350px;
            margin-left: 100px;
            margin-right: 100px;
            border-radius: 20px;
            margin-bottom: 80px;
        }
        .section3-1{
            padding-left: 50px;
            padding-top: 40px;
        }
        .part3{
            height: 2px;
            width: 1150px;
            background-color: #706762;
            margin-top: 40px;
            margin-left: auto;
            margin-right: auto;
        }
        .choix{
            background-color:#E3C7BC;
            border-top: 2px;
            border-left: 2px;
            border-right: 2px;
            width: 500px;
            height: 40px;
            font-size: 24px;
        }
        .objet3{
            font-size: 30px;
            color: black;
            padding-right:  435px;
        }
        .objet4{
            font-size: 30px;
            color: black;
            padding-right: 455px;
        }
        .objet5{
            font-size: 30px;
            color: black;
            padding-right: 495px;
        }
        .section4{
            background-color: #E3C7BC;
            height: 120px;
            margin-left: 100px;
            margin-right: 100px;
            border-radius: 20px;
            margin-bottom: 50px;
        }
        .part4{
            padding-left: 50px;
            padding-top: 40px;
        }
        .objet-prix{
            font-size: 30px;
            color: black;
            padding-right: 490px;
        }
        p{
            font-size: 18px;
            color: black;
        }
        .paragraphe{
            padding-left: 100px;
            padding-bottom: 80px;
        }
        .bouton{
            padding-left: 750px;
        }

        .bouton2{
            border-radius: 10px;
            color: #FFFFFF;
            background-color: #A67F75;
            width: 250px;
            height: 60px;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <div class="header1">
        <a href="index.php"><img src="assets/LOGO.png" alt="Logo"></a>
    </div>
    <div>
        <div align="center">
            <table>
                <tr>
                    <td><a href="#"><img src="assets/Rechercher.png" alt="Loupe"></a></td>
                    <td><a href="sale.php"><img src="assets/Vendre2.png" alt="Etiquette"></a></td>
                    <td><a href="chat.html"><img src="assets/Message.png" alt="Bulle"></a></td>
                    <td><a href="profil/profil.php"><img src="assets/Compte.png" alt="Contact"></a></td>
                    <td><a href="cart.html"><img src="assets/Panier.png" alt="Panier"></a></td>
                </tr>
            </table>
        </div>
        <div>
            <h1>Vends ton sac </h1>
        </div>
        <form method="post">
            <div class="photo">
                <h3 class="titre">Ajoute jusqu’à 15 photos</h3>
                <div class="telechargement" align="center" >
                    <div class="telechargement2">
                        <label for="file" class="nom">Ajoute des photos</label>
                        <input type="file" id="file" name="file" multiple class="nom-file">
                    </div>
                </div>
            </div>
            <div class="section2">
                <div class="part1">
                    <label for="titre1" class="objet">Titre</label>
                    <input type="text" name="title" id="titre1" class="titre1" placeholder="Exemple : Sac idéal pour l'été">
                </div>
                <div class="part2"></div>
                <div class="part1">
                    <label for="titre2" class="objet2">Décris ton article</label>
                    <input type="text" name="description" id="titre2" class="titre1" placeholder="Exemple : blanc, avec lanière, ..." required>
                </div>
            </div>
            <div class="section3">
                <div class="section3-1">
                    <label for="titre3" class="objet3">Catégorie</label>
                    <select name="category" id="titre3" class="choix">
                        <option value="Sport">Sport</option>
                        <option value="Sac à dos">Sac à dos</option>
                        <option value="Tote">Tote</option>
                        <option value="Professionnel">Professionnel</option>
                        <option value="Sac à main">Sac à main</option>
                        <option value="Sac de plage">Sac de plage</option>
                    </select>
                </div>
                <div class="part3"></div>
                <div class="section3-1">
                    <label for="titre4" class="objet4">Marque</label>
                    <select name="brand" id="titre4" class="choix">
                        <option value="Louis Vuitton">Louis Vuitton</option>
                        <option value="Fendi">Fendi</option>
                        <option value="Versace">Versace</option>
                        <option value="Burberry">Burberry</option>
                        <option value="Chanel">Chanel</option>
                        <option value="Dior">Dior</option>
                    </select>
                </div>
                <div class="part3"></div>
                <div class="section3-1">
                    <label for="titre5" class="objet5">État</label>
                    <select name="state" id="titre5" class="choix">
                        <option value="Très bon">Très bon</option>
                        <option value="Bon">Bon</option>
                        <option value="Correcte">Correct</option>
                    </select>
                </div>
            </div>
            </div>
            <div class="section4">
                <div class="part4">
                    <label for="prix" class="objet-prix">Prix</label>
                    <input type="number" step="0.01" name="price" id="prix" class="titre1" placeholder="0.00 €" required>
                </div>
            </div>
            <div class="paragraphe">
                <p>Un vendeur professionnel se faisant passer pour un consommateur ou un non-professionnel sur Bintage encourt les sanctions prévues à l'Article L. 132-2 <br> du Code de la Consommation.</p>
            </div>
            <div class="bouton">
                <input type="submit" class="bouton2" value="Ajouter">
            </div>
        </form>
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