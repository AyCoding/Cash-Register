<?php
require_once 'bdd.php';
// Connexion BDD
$db = new PDO('mysql:host='. DB_HOST .';dbname='. DB_DBNAME . ';charset=UTF8;', DB_USER, DB_PASS);

// Récupéreration tous les éléments
$sql = "SELECT * FROM `acompte`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();

/*echo '<pre>';
print_r($data);
echo '</pre>';
echo $data[1][1];*/
?>
<header>
    <div class="left">
        <a href="caisse.php">
            <span>Produits</span>
        </a>

        <a href="#">
            <span>Acompte</span>
        </a>

        <a href="#">
            <span>Admin</span>
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
                <?= substr($value['first_name'], 0, 1), '.'; ?>
                <?= $value['last_name'] ?>
                <!--J. Doe-->
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</header>