<?php

session_start();

function check_connexion()
{
    if (isset($_SESSION['connect']) && $_SESSION['connect'] === true) {
        return true;

    } else {
        return false;
    }
}
