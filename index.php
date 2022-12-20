<?php
include "controller/Auth/auth.php";
Connecte();
Forcer_connexion();

//include_once "php/database.php";
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
    <title>Caserne Nouzonville</title>
</head>
<body>
<?php include_once "./view/header.php"; ?>
<main>
    <?php
    if (isset($_GET['page'])) {
        switch ($_GET['page']) {
            case 'admin':
                include "./templates/admin.php";
                break;
            case 'profil':
                include "./templates/profil.php";
                break;
            case 'acompte':
                include "./templates/acompte.php";
                break;
            case 'logs':
                include "./templates/logs.php";
                break;
            default:
                include "./templates/caisse.php";
                break;
        }
    } else {
        include "./templates/caisse.php";
    }
    ?>
</main>
</body>
</html>