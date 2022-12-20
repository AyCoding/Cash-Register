<?php
if ($_SESSION['type_account'] != 'Admin') {
    header('location: ./');
}

$sql = "SELECT * FROM `logs`";
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
<h1>Logs</h1>
<table>
    <thead>
    <tr>
        <td>Utilisateur</td>
        <td>Action</td>
        <td>Date</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value) {
        echo '<tr>';
        echo '<td>' . $value['nom'] . ' ' . $value['prenom'] . '</td>';
        echo '<td>' . $value['action'] . '</td>';
        echo '<td>' . $value['date'] . '</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
</body>
<style>
    h1 {
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        margin: 20px auto;
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
        /*width: 200px;*/
        max-width: 90%;
        text-align: center;
    }

    td a {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>