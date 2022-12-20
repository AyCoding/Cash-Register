<?php
// Création d'utilisateur
function CreateUser($nom, $prenom, $pseudo, $pass, $role)
{
    global $db;
    // Insertion dans la table 'users'
    $sql = "INSERT INTO `users`(nom, prenom, pseudo, password, type_account, acompte) VALUES (:nom, :prenom, :pseudo, :password, :type_account, :acompte)";

    $result = $db->prepare($sql);
    $result->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':pseudo' => $pseudo,
        ':password' => hash('sha256', $pass),
        ':type_account' => $role,
        ':acompte' => 0
    ]);
    header('location: ?page=admin');
    addLogs("Création d'utilisateur");
}

// Modification des acomptes
function modifAcompte($acompte, $id)
{
    global $db;
    $sql = "UPDATE `users` SET `acompte`= :acompte WHERE `id`= :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':acompte' => $acompte,
        ':id' => $id
    ]);
    addLogs("Modification d'acompte");
}

// Modification On
function modifOn($modif)
{
    if ($modif == True) {
        return True;
    }
    return False;
}

// Suppression de compte
function delById($id)
{
    global $db;
    $sql = "DELETE FROM `users` WHERE `users`.`id` = :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':id' => $id,
    ]);
    addLogs("Suppression de compte");
}

// Gestion des logs
function AddLogs($action)
{
    global $db;
    // TimeZone paris
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `logs`(nom, prenom, action, date) VALUES (:nom, :prenom, :action, :date)";
    $result = $db->prepare($sql);
    $result->execute([
        ':nom' => $_SESSION['nom'],
        ':prenom' => $_SESSION['prenom'],
        ':action' => $action,
        ':date' => $date
    ]);
}