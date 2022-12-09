<?php
function Connecte(): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION['CONNECTED']);
}

function Forcer_connexion(): void
{
    if (!Connecte()) {
        header('location: /login.php');
        exit();
    }
}