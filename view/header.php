<?php
// Connexion BDD
require_once '../php/database.php';

// Récupéreration tous les éléments
$sql = "SELECT * FROM `acompte`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();

/*echo '<pre>';
print_r($data);
echo '</pre>';*/
//echo $data[1][1];
?>
<header>
    <div class="left">
        <a href="/caisse.php">
            <span>Produits</span>
        </a>

        <a href="#">
            <span>Acompte</span>
        </a>

        <a href="#">
            <span>Admin</span>
        </a>

    </div>
    <div class="right" style="flex-flow: column; align-items: flex-start">
                <?php foreach ($data as $key => $value): ?>
        <a href="#" style="position: relative">
            <span class="cash">
                <?= $value['total_acompte'],'€' ?>
                <!--130,00€-->

            </span>
            <span class="user">
                <?= substr($value['first_name'], 0, 1), '.'; ?>
                <?= $value['last_name'] ?>
                <!--J. Doe-->
            </span>
            <svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"/><path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" fill=""/></svg>
        </a>
                <?php endforeach; ?>
    </div>
</header>