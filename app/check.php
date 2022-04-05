<?php

function check_if_connected($setup, $get) {
    if ($setup) {
        if (!isset($_SESSION["email"])) {
            header("Location: profil/login.php?$get");
            exit();
        }
    } else {
        if (isset($_SESSION["email"])) {
            header("Location: profil/profil.php?$get");
            exit();
        }
    }
}