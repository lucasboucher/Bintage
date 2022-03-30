<?php

require_once('profil/check_if_connected.php');

?>

<!doctype html>
<html lang="fr">

<head>
    <title>Projet Full stack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>

<body>
    <h1>Accueil</h1>

    <?php

        if (check_if_connected() == true) {
            ?>
                <p>Vous êtes connecté !</p>
                <a href="profil/page_profil.php">Modifier son compte utilisateur</a><br><br>
            <?php

        } else {
            ?>
                <p>Vous n'êtes pas connecté !</p>
                <a href="profil/page_inscription.php">Page d'inscription</a><br>
                <a href="profil/page_connexion.php">Page de connexion</a><br><br>
            <?php
        }

    ?>

    <a href="crud/read.php">Accès au CRUD des utilisateurs</a>

</body>

</html>

<!--

TODO Ne pas pouvoir créer deux compte à la même adresse email
TODO Faire une barre de navigation et des boutons retour
TODO Faire la page de modification du profil
TODO Vérifier que la base de données est fermée à chaque fois
