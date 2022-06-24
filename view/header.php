<?php

// Connexion BDD
$db = new PDO('mysql:host=localhost;dbname=caisse;charset=UTF8;', 'root', '');

// Récupéreration tous les éléments
$sql = "SELECT * FROM `acompte`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();

?>
<header>
    <div class="left">
        <a href="#">
            <span>Produits</span>
        </a>

        <a href="#">
            <span>Acompte</span>
        </a>

        <a href="#">
            <span>Profil</span>
        </a>

    </div>
    <div class="right">
        <?php foreach ($data as $key => $value): ?>
        <a href="#">
            <span class="cash">
                <?= $value['total_acompte'],'€' ?>
                <!--130,00€-->
            </span>
            <span class="user">
                <?= $value['first_name'] ?>
                <?= $value['last_name'] ?>
                <!--J. Doe-->
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</header>