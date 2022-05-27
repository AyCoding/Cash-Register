<?php

// Connexion BDD
$db = new PDO('mysql:host=localhost;dbname=caisse;charset=UTF8;', 'root', '');

// Récupéreration tous les éléments
$sql = "SELECT * FROM `produits`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();

// Boucle foreach
// Suppression des quantités
// Ensuite mettre le prog dans un autre fichiers

// Pour ajouté des produits et quantité
//INSERT INTO `produits` (`id`, `name`, `stocks`) VALUES ('3', 'Test', '2');

// Pour supprimer des produits ou quantité
//DELETE FROM produits WHERE `produits`.`id` = 3

// Pour mettre à jour la quantité
//$sql = "UPDATE `produits` SET `stocks` = \'10\' WHERE `produits`.`id` = 2;";

//$_POST['number'] = null;
?>

<main>
    <table>
        <thead>
        <tr>
            <th>Produits</th>
            <th>Quantité</th>
            <th>Combien ?</th>
            <th>Validation</th>
        </tr>
        </thead>
        <tbody>

        <!-- Commencez ici la prog pour la génération auto -->
        <?php foreach ($data as $key => $value): ?>

            <tr>
                <td><?= $value['name']; ?></td>
                <td><?= $value['stocks']; ?></td>
                <form action="" method="POST">
                    <td>
                        <input type="number" name="number" id="number" placeholder="Nombre" required>
                        <!-- Faire calcul chiffre existant - chiffre indiquer -->
                        <?php if ($_POST['number']): ?>

                            <?= $_POST['number']; ?>
                        <?php endif ?>
                    </td>

                    <td>
                        <button type="submit">Valide</button>
                    </td>
                </form>
            </tr>
        <?php endforeach ?>

        <!-- END Génération auto -->
        </tbody>
    </table>

</main>

