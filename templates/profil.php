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

<?php
// Logs
$sql = "SELECT * FROM `logs` where nom = :nom AND prenom = :prenom";
$result = $db->prepare($sql);
$result->execute([
    ':nom' => $_SESSION['nom'],
    ':prenom' => $_SESSION['prenom']
]);
$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<?php echo '<h1 class="logs">Logs pour ' . $_SESSION['nom'] . ' ' . $_SESSION['prenom'] . '</h1>' ?>
<table style="margin-top: 20px;">
    <?php foreach ($data as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['nom'] . ' ' . $value['prenom'] . '</td>';
        echo '<td>' . $value['action'] . '</td>';
        echo '<td>' . $value['date'] . '</td>';
        echo '</tr>';
    }
    ?>
</table>
<?php include_once "view/footer.php"; ?>

</body>
</html>

<style>
    h1.logs {
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        margin: 20px auto;
    }

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

    thead {
        font-weight: bold;
    }

    table {
        margin: auto;
    }

    table,
    td {
        border: 1px solid #333;
    }

    thead,
    tfoot {
        background-color: #333;
        color: #fff;
    }

    tr > * {
        padding: 15px 30px;
    }

    td {
        width: 200px;
        max-width: 90%;
        text-align: center;
    }

    td a {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>