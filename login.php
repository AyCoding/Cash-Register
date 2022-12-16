<?php
$error = False;
include "controller/Auth/connexion.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="src/css/styles.css">
    <title>Connexion</title>
</head>
<body>
<section class="index">
    <div class="container">
        <div class="login">
            <h1>Connexion</h1>
            <form action="" method="POST">
                <input type="text" name="pseudo" placeholder="Pseudo" required>
                <input type="password" name="password" placeholder="Mot de passe">
                <input type="submit" id="submit" name="submit" value="Se connecter">
                <?php
                if ($error) {
                    echo '<div style="color: red; padding: 15px 30px; margin: 10px auto;background: #F2F2F2;font-weight: bold">' . $error . '</div>';
                }
                ?>
            </form>
        </div>
    </div>
</section>
</body>
</html>
<style>
    html {
        height: 100%;
        width: 100%;
    }

    .container {
        margin: 100px auto;
        max-width: 500px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center
    }

    .login {
        max-width: 90%;
        width: 350px;
    }

    h1 {
        font-size: 50px;
        font-weight: bold;
        margin-bottom: 30px;
        text-align: center;
    }

    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 20px;
    }

    input {
        margin: auto auto 20px;
        text-align: center;
        font-size: 16px;
        outline: none;
        width: 100%;
        padding: 10px 0;
        border: 1px solid #333;
    }

    input::placeholder {
        font-weight: bold;
    }

    #submit {
        font-weight: bold;
    }

    #submit:hover {
        background: #333;
        color: #FFF;
        transition: .3s;
        cursor: pointer;
    }
</style>

