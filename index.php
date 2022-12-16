<?php
include "controller/Auth/auth.php";
Connecte();
Forcer_connexion();

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/NotoFirefighterMediumSkinTone.svg">
    <link rel="stylesheet" href="src/css/styles.css">
    <title>Accueil | Caserne Nouzonville</title>
</head>
<body>
<main>
    <?php
    switch ($_SESSION['type_account']) {
        case 'Admin':
            include "admin.php";
            break;
        case 'Base':
            include "caisse.php";
            break;
    }
    ?>
</main>
</body>
</html>
<!--<style>


    a {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #FFF;
        border-radius: 4px;
        font-size: 16px;
        font-weight: 600;
        margin-left: 2%;
    }

    a:hover {
        background: #555;
        transition: .3s;
    }
</style>-->