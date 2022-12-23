<?php
if ($_SESSION['type_account'] != 'Admin') {
    header('location: ./');
}

$sql = "SELECT * FROM `logs` ORDER BY date DESC";
$result = $db->prepare($sql);
$result->execute();
$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
<h1>Logs</h1>
<table>
    <thead>
    <tr>
        <td>IP</td>
        <td>Utilisateur</td>
        <td>Action</td>
        <td>Date</td>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $value) {
        echo '<tr>';
        echo '<td>' . $value['ip_addr'] . '</td>';
        echo '<td>' . strtoupper($value['nom']) . ' ' . $value['prenom'] . '</td>';
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
        margin: 50px auto;
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
        padding: 5px 15px;
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