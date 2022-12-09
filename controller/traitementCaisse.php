<?php
// Connexion BDD
include_once 'php/database.php';

// Récupéreration tous les éléments
$sql = "SELECT * FROM `produits`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();
?>

<!-- START Génération auto -->
<?php foreach ($data as $key => $value): ?>

    <tr class="tr">
        <td><?= $value['name']; ?></td>
        <td><?= $value['stocks']; ?></td>
        <td class="price"><?= $value['price']; ?></td>
        <td style="position: relative;" class="td-count">
            <div style="display: flex; border: 0; justify-content: space-around; align-items: center; user-select: none">
                <svg style="position: absolute; left: 5%; cursor: pointer" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     aria-hidden="true" role="img" class="iconify iconify--mdi minus" width="32" height="32"
                     preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M17 13H7v-2h10m2-8H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"></path>
                </svg>

                <!-- Nombre incrémenter -->
                <p class="number" style="position: absolute">0</p>

                <svg style="position: absolute; right: 5%; cursor: pointer" xmlns="http://www.w3.org/2000/svg"
                     xmlns:xlink="http://www.w3.org/1999/xlink"
                     aria-hidden="true" role="img" class="iconify iconify--mdi plus" width="32" height="32"
                     preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                    <path fill="currentColor"
                          d="M17 13h-4v4h-2v-4H7v-2h4V7h2v4h4m2-8H5c-1.11 0-2 .89-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V5a2 2 0 0 0-2-2Z"></path>
                </svg>
            </div>
        </td>
    </tr>
<?php endforeach ?>
<!-- END Génération auto -->
