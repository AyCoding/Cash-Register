<?php
session_start();

// Si l'envoie des pas vide.
if (isset($_POST['submit'])) {

    // Récupération des données de 'login.php'
    $username = $_POST['pseudo'];
    $password = $_POST['password'];

    // On récupère dans la table "user" tous les utilisateurs
    $sql = "SELECT * FROM `users` WHERE pseudo = :pseudo";

    // On prépare la lecture de BDD
    $result = $db->prepare($sql);
    $result->execute([
        ':pseudo' => $username,
    ]);


    if ($result->rowCount() > 0) {
        // Récuperer toutes la table "users"
        $data = $result->fetchAll();

        // Vérification du mot de passe hashé avec celui qui a été saisie
        if (hash('sha256', $password) == $data[0]['password']) {

            // SESSION SET
//            $_SESSION['LOGGED_USER'] = $data[0]['pseudo'];
//            $_SESSION['LOGGED_ROLE'] = $data[0]['role'];
            $_SESSION['CONNECTED'] = true;
            header('location: /');
            exit();

        } else {
            $error = "Nom d'utilisateur ou mot de passe incorrects !";
        }
    }
}