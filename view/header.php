<?php
// Connexion BDD
require_once 'php/database.php';

// Récupération tous les éléments
$sql = "SELECT * FROM `users`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();
?>
<link rel="stylesheet" href="src/css/styles.css">
<header>
    <div class="left">
        <a href="./controller/Auth/logout.php">Déconnexion</a>
        <a href="./?page=produit">Produits</a>
        <a href="./?page=acompte">Acompte</a>
        <a href="./?page=profil">Profil</a>
        <?php
        if ($_SESSION['type_account'] == 'Admin') {
            echo '<a href="./?page=admin">Admin</a>';
        }
        ?>

    </div>
    <div class="right" style="flex-flow: column; align-items: flex-start">
        <?php foreach ($data as $key => $value) {
            if ($value['id'] == $_SESSION['id']) {
                echo '<a href="" style="position: relative">';
                echo '<span class="cash">';
                echo $value['acompte'] . '€';
                echo '</span>';
                echo '<span class="user">';
                echo $value['prenom'] . ' ' . $value['nom'][0] . '.';
                echo '</span>';
                echo '<svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                 height="24">
                <path fill="none" d="M0 0h24v24H0z"/>
                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" fill=""/>
                </svg>';
                echo '</a>';
            }
        }
        ?>
    </div>
</header>