<?php

    // Initialiser la session
    session_start();

    require('check.php');
    check_if_connected(true, "no_connected");

    if (isset($_GET['already'])) {
        echo "Vous êtes déjà connecté.";
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Votre profil</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="sucess">
            <h1>Bienvenue <?php echo $_SESSION['email']; ?> !</h1>
            <p>C'est votre tableau de bord.</p>
            <a href="logout.php">Déconnexion</a>
        </div>
    </body>
</html>