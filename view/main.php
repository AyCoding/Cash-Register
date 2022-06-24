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
            <th>Prix</th>
            <!--<th>Validateur</th>-->
        </tr>
        </thead>
        <tbody>

        <!-- Commencez ici la prog pour la génération auto -->
        <?php foreach ($data as $key => $value): ?>

            <tr>
                <td><?= $value['name']; ?></td>
                <td><?= $value['stocks']; ?></td>
                <td><?= $value['price'], '€'; ?></td>
                <td>
                    <!--<form action="">-->
                        <div style="display: flex; border: 0; justify-content: space-around; align-items: center; border-bottom: 2px solid #141414;">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32"
                                 preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M17 13H7v-2h10m2-8H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"></path>
                            </svg>

                            <!-- Nombre incrémenter -->
                            <p>5</p>

                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                 aria-hidden="true" role="img" class="iconify iconify--mdi" width="32" height="32"
                                 preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m2-8H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"></path>
                            </svg>
                        </div>
                </td>
                <!--</form>-->
            </tr>
        <?php endforeach ?>

        <!-- END Génération auto -->
        </tbody>
    </table>

</main>

