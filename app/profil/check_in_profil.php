<?php

function check_if_connected($setup, $get) {
    if ($setup) {
        if (!isset($_SESSION["email"])) {
            header("Location: login.php?$get");
            exit();
        }
    } else {
        if (isset($_SESSION["email"])) {
            header("Location: profil.php?$get");
            exit();
        }
    }
}