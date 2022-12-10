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
    header('location: /#');
}

function modifAcompte($acompte, $id)
{
    global $db;
    global $id;
    $sql = "UPDATE `users` SET `acompte`= :acompte WHERE `id`= :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':acompte' => $acompte,
        ':id' => $id
    ]);
}