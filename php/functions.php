<?php
// Création d'utilisateur
function CreateUser($pseudo, $pass, $role)
{
    global $db;
    // Insertion dans la table 'users'
    $sql = "INSERT INTO `users`(pseudo, password,role, acompte) VALUES (:pseudo,:password,:role,:acompte)";

    $result = $db->prepare($sql);
    $result->execute([
        ':pseudo' => $pseudo,
        ':password' => hash('sha256', $pass),
        ':role' => $role,
        ':acompte' => 0
    ]);
}