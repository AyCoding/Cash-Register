<?php
$sql = 'SELECT * FROM `users`';

$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
<table>
    <thead>
    <tr>
        <td>Compte</td>
        <td>Acompte</td>
    <tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $key => $value) {
        echo '<tr>';
        echo '<td>' . $value['nom'] . ' ' . $value['prénom'] . '</td>';
        echo '<td>' . $value['acompte'] . '€</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</body>

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

    td a {
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
