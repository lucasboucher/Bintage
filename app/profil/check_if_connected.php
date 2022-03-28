<?php

session_start();

function check_if_connected(): bool
{
    if (isset($_SESSION['connect']) && $_SESSION['connect'] === true) {
        return true;

    } else {
        return false;
    }
}
