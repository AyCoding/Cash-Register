<?php
include_once "php/database.php";
include_once "php/functions.php";

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    CreateUser($nom, $prenom, $pseudo, $pass, $role);
}
?>
<form action="" method="POST">
    <input type="text" name="nom" placeholder="Nom">
    <input type="text" name="prenom" placeholder="Prénom">
    <input type="text" name="pseudo" placeholder="Pseudo">
    <input type="password" name="password" placeholder="Password">
    <input type="text" name="role" placeholder="Rôle">
    <select name="role" id="role">
        <option value="">None</option>
        <option value="Admin">Admin</option>
        <option value="Base">Base</option>
    </select>
    <input type="submit" name="submit" value="Envoyer">
    <a href="?page=admin" class="cancel">Annuler</a>
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

    form input, select, form a {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #FFF;
        border-radius: 4px;
    }

    form input:hover, form a:hover {
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
