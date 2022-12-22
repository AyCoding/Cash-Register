<?php
const SESSION_CONNECTE = 'CONNECTED';

function estConnecte(): bool
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    return !empty($_SESSION[SESSION_CONNECTE]);
}

function verifierConnexion(): void
{
    if (!estConnecte()) {
        header('location: ./login.php');
        exit();
    }
}