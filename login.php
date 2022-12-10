<?php
include "php/database.php";
include "php/functions.php";

if (isset($_POST['submit'])) {
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    CreateUser($pseudo, $pass, $role);
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="POST">
    <input type="text" name="pseudo" placeholder="Pseudo">
    <input type="password" name="password" placeholder="Password">
    <input type="role" name="role" placeholder="Rôle">
    <input type="submit" name="submit" value="Envoyer">
</form>

</body>
</html>
<style>
    h1, form {
        margin: 30px;
    }

    form {
        display: flex;
        gap: 10px;
    }

    form input, select {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #FFF;
        border-radius: 4px;
    }

    form input:hover {
        background: #555;
        transition: .3s;
    }
</style>
