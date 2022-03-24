f<?php
require_once('connect.php');
$sql = 'SELECT * FROM `user`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
require_once('close.php');
?>

<html>

<head>
    <title>Liste des utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>

    <div class="container">

        <H1>CRUD des utilisateurs</H1>

        <table class="table">

            <?php
        foreach($result as $utilisateur){
            ?>
            <tr>
                <td><?= $utilisateur['id'] ?></td>
                <td><?= $utilisateur['email'] ?></td>
                <td><?= $utilisateur['password'] ?></td>
                <td><?= $utilisateur['name'] ?></td>
                <td><a href="read_one.php?id=<?= $utilisateur['id'] ?>">Voir</a>
                <td><a href="update.php?id=<?= $utilisateur['id'] ?>">Modifier</a>
                <td><a href="delete.php?id=<?= $utilisateur['id'] ?>">Supprimer</a>
            </tr>

            <?php
        }?>

        </table>
        <a href="create.php">Ajouter</a>
        <a href="index.php">Retour</a>
    </div>
</body>

</html>