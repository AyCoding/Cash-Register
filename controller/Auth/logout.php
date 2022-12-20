<?php

//! LOGOUT

session_start();
unset($_SESSION['CONNECTED']);
// TimeZone paris
include_once "./../../php/database.php";
include_once "./../../php/functions.php";
addLogs('Déconnexion');

header('Location: ./../../login.php');
