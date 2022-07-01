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

<?php include "view/header.php"; ?>

<main>
    <table>
        <thead>
        <tr>
            <th>Produits</th>
            <th>Quantité</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>

        <?php include "controller/traitementCaisse.php" ?>
        <tr>
            <td style="font-weight: 900" colspan="2">Total</td>
            <td colspan="2" id="total">0</td>
        </tr>

        </tbody>
    </table>
</main>


<?php include "view/footer.php"; ?>


<script src="src/js/main.js"></script>
</body>
</html>
