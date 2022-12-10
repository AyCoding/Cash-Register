<?php
include "php/database.php";
include "view/header.php";
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
        <td></td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value) {
        echo '<tr>';
        echo '<td>' . $value['nom'] . '</td>';
        echo '<td>' . $value['prénom'] . '</td>';
        echo '<td>' . $value['acompte'] . '€</td>';
//        echo "<td><a href='modif.php?id={$value['id']}&nom={$value['nom']}&prénom={$value['prénom']}&=acompte{$value['acompte']}'>Modifier</a></td>";
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
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
</style>
