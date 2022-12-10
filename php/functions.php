<?php
// Création d'utilisateur
function CreateUser($nom, $prenom, $pass, $role)
{
    global $db;
    // Insertion dans la table 'users'
    $sql = "INSERT INTO `users`(nom, prénom, password,role, acompte) VALUES (:nom,:prenom,:password,:role,:acompte)";

    $result = $db->prepare($sql);
    $result->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':password' => hash('sha256', $pass),
        ':role' => $role,
        ':acompte' => 0
    ]);
    header('location: admin.php');
}

function modifAcompte($acompte, $id)
{
    global $db;
//    global $id;
    $sql = "UPDATE `users` SET `acompte`= :acompte WHERE `id`= :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':acompte' => $acompte,
        ':id' => $id
    ]);
}

function modifOn($modif)
{
    if ($modif == True) {
        return True;
    }
    return False;
}

function delById($id)
{
    global $db;
    $sql = "DELETE FROM `users` WHERE `users`.`id` = :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':id' => $id,
    ]);
}