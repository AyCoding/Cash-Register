<?php
include "db/database.php";

if (isset($_POST['submit'])) {

    $pseudo = $_POST['pseudo'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    // Insertion dans la table 'users'
    $sql = "INSERT INTO `users`(pseudo, password, role) VALUES (:pseudo,:password,:role)";

    $result = $db->prepare($sql);
    $result->execute([
        ':pseudo' => $pseudo,
        ':password' => hash('sha256', $pass),
        ':role' => $role
    ]);
    header('location: ./');
}