<?php include_once "view/header.php"; ?>
<?php include_once "controller/traitementCaisse.php"; ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../assets/NotoFirefighterMediumSkinTone.svg">
    <link rel="stylesheet" href="../src/css/styles.css">
    <title>Caserne de Nouzonville</title>
</head>
<body>
<main>
    <table>
        <thead>
        <tr>
            <td>Produits</td>
            <td>Quantité</td>
            <td>Prix</td>
        </tr>
        </thead>
        <tbody>

        <?php
        foreach ($data as $key => $value) {

            echo '<tr>';
            echo '<td>' . $value['produits'] . '</td>';
            echo '<td>' . $value['quantité'] . '</td>';
            echo '<td>' . $value['price'] . '</td>';
            echo '</tr>';

            echo '<tr>';
            echo '<td><svg width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M17 13H7v-2h10m2-8H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"/></svg></td>';
            echo '<td>0</td>';
            echo '<td><svg width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m2-8H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"/></svg></td>';
            echo '</td>';

        }
        ?>
        </tbody>
    </table>

    <?php
    $sql = 'SELECT * FROM `users`';

    $result = $db->prepare($sql);
    $result->execute();

    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    ?>
    <form action="">
        <SELECT name="role" size="1">
            <OPTION selected>None
                <?php foreach ($data as $key => $value) {
                    echo '<OPTION>' . $value['nom'] . ' ' . $value['prénom'];
                }
                ?>
        </SELECT>
    </form>
    <?php include_once "view/footer.php"; ?>
</main>

</body>
</html>
<style>
    table {
        width: 90%;
        margin: auto;
    }

    td {
        padding: 30px 15px;
        text-align: center;
    }

    thead {
        font-weight: bold;
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
</style>