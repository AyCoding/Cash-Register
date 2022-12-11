<?php
include_once "php/database.php";
include_once "php/functions.php";

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    CreateUser($nom, $prenom, $pass, $role);
}
?>
<form action="" method="POST">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="password" name="password" placeholder="Password">
    <input type="text" name="role" placeholder="Rôle">
    <input type="submit" name="submit" value="Envoyer">
    <a href="admin.php" class="cancel">Annuler</a>
</form>
<style>
    form {
        display: flex;
        max-width: 90%;
        width: 500px;
        margin: 5% auto;
        flex-direction: column;
        gap: 10px;
    }

    form input, select, a {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #FFF;
        border-radius: 4px;
    }

    form input:hover, a:hover {
        background: #555;
        transition: .3s;
    }

    input {
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
    }

    .cancel {
        text-align: center;
    }
</style>
