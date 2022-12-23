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
    echo "<script>window.location.href = '?page=admin'</script>";
    addLogs("Création d'utilisateur de " . $nom . " " . $prenom . " avec le rôle " . $role . " par " . $_SESSION['prenom'] . " " . $_SESSION['nom']);
}

// Modification d'utilisateur (à tester)
function UpdateUser($nom, $prenom, $pseudo, $pass, $role, $id)
{
    global $db;
    // Modification dans la table 'users'
    $sql = "UPDATE `users` SET nom = :nom, prenom = :prenom, pseudo = :pseudo, password = :password, type_account = :type_account WHERE id = :id";

    $result = $db->prepare($sql);
    $result->execute([
        ':nom' => $nom,
        ':prenom' => $prenom,
        ':pseudo' => $pseudo,
        ':password' => hash('sha256', $pass),
        ':type_account' => $role,
        ':id' => $id
    ]);
    echo "<script>window.location.href = '?page=admin'</script>";
    addLogs("Modification d'utilisateur de " . $prenom . " " . $nom . " avec le rôle " . $role . " par " . $_SESSION['prenom'] . " " . $_SESSION['nom']);
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
    $OldAcompte = $_GET['acompte'];
    $NewAcompte = $acompte;

    // Affiche le nom et prénom de l'utilisateur qui a été modifié
    $sql = "SELECT * FROM `users` WHERE `id`= :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':id' => $id
    ]);
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $nom = $user['nom'];
    $prenom = $user['prenom'];
    addLogs("Modification de l'acompte de l'utilisateur" . ' ' . $prenom . ' ' . $nom . " de " . $OldAcompte . '€' . " à " . $NewAcompte . "€" . " par " . $_SESSION['prenom'] . " " . $_SESSION['nom']);
}

// Suppression de compte utilisateur
function delById($id)
{
    global $db;

    // Affiche le nom et prénom de l'utilisateur qui a été supprimé
    $sql = "SELECT * FROM `users` WHERE `id`= :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':id' => $id
    ]);
    $user = $result->fetch(PDO::FETCH_ASSOC);
    $nom = $user['nom'];
    $prenom = $user['prenom'];

    $sql = "DELETE FROM `users` WHERE `id`= :id";
    $result = $db->prepare($sql);
    $result->execute([
        ':id' => $id,
    ]);

    addLogs("Suppression de l'utilisateur" . ' ' . $prenom . ' ' . $nom . " par " . $_SESSION['nom'] . " " . $_SESSION['prenom']);
}

// Gestion des logs
function AddLogs($action)
{
    global $db;
    // TimeZone Paris
    date_default_timezone_set('Europe/Paris');
    $date = date('Y-m-d H:i:s');
    $sql = "INSERT INTO `logs`(`ip_addr`, `nom`, `prenom`, `date`, `action`) VALUES (:ip_addr, :nom, :prenom, :date, :action)";
    $result = $db->prepare($sql);
    $result->execute([
        // Récupère l'adresse IP de l'utilisateur
        ':ip_addr' => getenv("REMOTE_ADDR"),
        // Récupère le nom de l'utilisateur
        ':nom' => $_SESSION['nom'],
        // Récupère le prénom de l'utilisateur
        ':prenom' => $_SESSION['prenom'],
        // Récupère la date
        ':date' => $date,
        // Récupère l'action
        ':action' => $action
    ]);
}