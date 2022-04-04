<?php
require_once('../../db_connect.php');
$sql = 'SELECT * FROM `sale`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('../../db_close.php');
?>

<html>

<head>
    <title>Liste des ventes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">

        <H1>CRUD des ventes</H1>

        <table class="table">

            <?php
        foreach($result as $vente){
            ?>
            <tr>
                <td><?= $vente['id'] ?></td>
                <td><?= $vente['title'] ?></td>
                <td><?= $vente['price'] ?></td>
                <td><?= $vente['state'] ?></td>
                <td><a href="read_one.php?id=<?= $vente['id'] ?>">Voir</a>
                <td><a href="update.php?id=<?= $vente['id'] ?>">Modifier</a>
                <td><a href="delete.php?id=<?= $vente['id'] ?>">Supprimer</a>
            </tr>

            <?php
        }?>

        </table>
        <a href="create.php">Ajouter</a>
        <a href="../index.html">Retour</a>
    </div>
</body>

</html>