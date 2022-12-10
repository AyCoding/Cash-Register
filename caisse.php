<?php include "view/header.php"; ?>
<?php include "controller/traitementCaisse.php"; ?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="assets/NotoFirefighterMediumSkinTone.svg">
    <link rel="stylesheet" href="src/css/styles.css">
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
            echo '<td>-</td>';
            echo '<td>0</td>';
            echo '<td>+</td>';
            echo '</td>';

        }
        ?>
        </tbody>
    </table>

    <?php include "view/footer.php"; ?>
</main>

<!--<script src="src/js/main.js"></script>-->
</body>
</html>
<style>
    table {
        width: 90%;
        margin: auto;
    }

    td {
        padding: 30px 15px;
        background: deepskyblue;
        text-align: center;
    }

    main {
        margin-top: 5%;
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