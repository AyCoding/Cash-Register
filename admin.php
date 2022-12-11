<?php
include_once "php/database.php";
include_once "view/header.php";
include_once "php/functions.php";

// Suppression un compte
if (isset($_GET['id']) && isset($_GET['del']) == 'True') {
    delById($_GET['id']);
}

$sql = 'SELECT * FROM `users`';

$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
<table>
    <thead>
    <tr>
        <td>Nom</td>
        <td>Prénom</td>
        <td>Acompte</td>
        <td colspan="2">Modif/Suppr.</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value) {
        echo '<tr>';
        echo '<td>' . $value['nom'] . '</td>';
        echo '<td>' . $value['prénom'] . '</td>';
        echo '<td>' . $value['acompte'] . '€</td>';
        echo "<td><a href='?id={$value['id']}&acompte={$value['acompte']}&modif=True'>Modifier</a></td>";
        echo "<td><a href='?id={$value['id']}&del=True'>Supprimer</a></td>";
        echo '</tr>';
        // &nom={$value['nom']}&prénom={$value['prénom']}&role={$value['role']}
    }
    ?>
    </tbody>
</table>
<a href="?add_account=True" class="btn__add-account">Ajouter un compte</a>
<?php
// Ajout d'un compte
if (isset($_GET['add_account']) == 'True') {
    include "create.php";
}

// Modification d'acompte
if (isset($_GET['id']) && isset($_GET['modif']) == True) {
    echo '<form action="" method="POST">';
    echo "<input type='text' name='acompte' placeholder='acompte' value='{$_GET['acompte']}'>";
    echo '<input type="submit" name="submit" value="Envoyer">';
    echo "</form>";
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        $acompte = $_POST['acompte'];
        modifAcompte($acompte, $id);
        header('location: admin.php');
    }
}
?>
</body>
</html>


<style>
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

    .btn__add-account {
        background: #333;
        color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px auto;
        width: 200px;
        padding: 15px 30px;
        text-decoration: none !important;
    }

    .btn__add-account:hover {
        background: #555;
        transition: .3s;
    }

    a {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #FFF;
        border-radius: 4px;
    }

    a:hover {
        background: #555;
        transition: .3s;
    }
</style>
