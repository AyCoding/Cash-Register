<?php
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'caisse';

try {
    $db = new PDO("mysql:host=" . $dbServername . ";dbname=" . $dbName . ";charset=UTF8", $dbUsername, $dbPassword);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
} catch (PDOException $e) {
    echo utf8_encode($e->getMessage());
    die();
}