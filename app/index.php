<?php
require_once('db_connect.php');
$sql = 'SELECT * FROM `sale` ORDER BY ID DESC LIMIT 4';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('db_close.php');
?>

<html lang="fr">
    <head>
        <link rel="icon" type="image/png" sizes="16x16" href="assets/LOGO.png">
        <meta charset="utf-8" />
	    <title>Accueil</title>
        <style>
            body{
                background-color: #FFF8F7;
            }
            div.header1{
                width: 253px;
                margin: 50px auto 40px;
            }
            h1{
                font-size: 36px;
                font-family: Montserrat, serif;
                font-style: normal;
                padding-top: 50px;
                padding-bottom: 35px;
                padding-left: 185px;
            }
            tr{
                height: 50px;
            }
            td{
                padding-left: 30px;
            }
            h2{
                font-size: 24px;
                color: rgba(0, 0, 0, 0.534);
            }
            .categorie{
                padding-top: 80px;
            }
            .ligne{
                height: 2px;
                width: 1100px;
                background-color: #706762;
                margin-top: 80px;
                margin-left: auto;
                margin-right: auto;
            }
            .footer{
                margin-top: 30px;
                margin-bottom: 50px;
            }
            .last_sales {
                text-align: center;
                display: flex;
                padding-left: 185px;
                border: 1px;
            }
        </style>
    </head>
    <body>
        <div class="header1">
           <a href="index.php"> <img src="assets/LOGO.png" alt="Logo"></a>
        </div>
        <div> 
            <div align="center">
                <table>
                    <tr>
                        <td><a href="#"><img src="assets/Rechercher.png" alt="Loupe"></a></td>
                        <td><a href="sale.php"><img src="assets/Vendre.png" alt="Etiquette"></a></td>
                        <td><a href="chat.html"><img src="assets/Message.png" alt="Bulle"></a></td>
                        <td><a href="profil/profil.php"><img src="assets/Compte.png" alt="Contact"></a></td>
                        <td><a href="cart.html"><img src="assets/Panier.png" alt="Panier"></a></td>
                    </tr>
                </table>
            </div>
            <div>
                <h1>Derniers sacs</h1>
            </div>
            <div class="last_sales">
                <?php
                    $i = 1;
                    foreach($result as $test) {
                        ?>
                        <div>
                            <img src="assets/bag<?= $i ?>.png" alt="vetemenet" width="350px">
                            <h2><?= $test['title'] ?></h2>
                        </div>
                        <?php
                        $i++;
                    }
                ?>
            </div>
            <div>
                <h1>Notre collection été</h1>
            </div>
            <div align="center">
                <img src="assets/Image2.png" alt="vetemenet">
            </div>
            <div align="center" class="categorie">
                <img src="assets/Image3.png" alt="vetemenet">
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
                        <td class="footer2"><h2><a href="crud/index.html">CRUD</a></h2></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>

<?php
    foreach($result as $test){
         echo $test['title'] ;
    }
?>