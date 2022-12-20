<?php
require_once 'php/database.php';
$sql = 'SELECT * FROM `users` WHERE id = :id';
$result = $db->prepare($sql);
$result->execute([
    ':id' => $_SESSION['id']
]);
$data = $result->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../src/css/styles.css">
    <title>Profil</title>
</head>
<body>

<?php include_once "view/header.php"; ?>
    <div class="profil">
        <h1>Profil</h1>
        <div class="profil__info">
            <p>Nom : <?= $data['nom'] ?></p>
            <p>Prénom : <?= $data['prenom'] ?></p>
            <p>Role : <?= $data['type_account'] ?></p>
            <p>Acompte : <?= $data['acompte'] ?>€</p>
        </div>
    </div>
<?php include_once "view/footer.php"; ?>

</body>
</html>

<style>
    .profil {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
    }

    .profil__info {
        display: flex;
        flex-direction: column;
        /*align-items: center;*/
        justify-content: center;
        margin-top: 50px;
        gap: 15px;
    }
    h1 {
        font-size: 50px;
        font-weight: bold;
    }
</style>