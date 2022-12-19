<?php
// Paramètre de connexion
include "php/database.php";

session_start();

// Si l'envoie des pas vide.
if (isset($_POST['submit'])) {

    // Récupération des données de 'login.php'
    $username = $_POST['pseudo'];
    $password = $_POST['password'];

    // On récupère dans la table "user" tous les utilisateurs
    $sql = "SELECT * FROM `users` WHERE pseudo = :pseudo AND password = :password";

    // On prépare la lecture de BDD
    $result = $db->prepare($sql);
    $result->execute([
        ':pseudo' => $username,
        ':password' => hash('sha256', $password)
    ]);


    if ($result->rowCount() > 0) {
        // Récupérer la ligne de la table
        $data = $result->fetch(PDO::FETCH_ASSOC);

        // Vérification du mot de passe hash avec celui qui a été saisie
        if (hash('sha256', $password) === $data['password']) {

            // SESSION SET
            $_SESSION['id'] = $data['id'];
            $_SESSION['CONNECTED'] = true;
            $_SESSION['nom'] = $data['nom'];
            $_SESSION['prénom'] = $data['prénom'];
            $_SESSION['pseudo'] = $data['pseudo'];
            $_SESSION['type_account'] = $data['type_account'];
            $_SESSION['acompte'] = $data['acompte'];
            header('location: ./');
            exit();

        }
    } else {
        $error = "Nom d'utilisateur ou mot de passe incorrects !";
    }
}