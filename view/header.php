<?php
// Connexion BDD
require_once 'php/database.php';

// Récupération tous les éléments
$sql = "SELECT * FROM `users`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();

// Tous les SVG du header hormis le dernier logo
$logoutSGV = '<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="m6.265 3.807l1.147 1.639a8 8 0 1 0 9.176 0l1.147-1.639A9.988 9.988 0 0 1 22 12c0 5.523-4.477 10-10 10S2 17.523 2 12a9.988 9.988 0 0 1 4.265-8.193zM11 12V2h2v10h-2z"/></svg>';
$cartSVG = '<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M4 16V4H2V2h3a1 1 0 0 1 1 1v12h12.438l2-8H8V5h13.72a1 1 0 0 1 .97 1.243l-2.5 10a1 1 0 0 1-.97.757H5a1 1 0 0 1-1-1zm2 7a2 2 0 1 1 0-4a2 2 0 0 1 0 4zm12 0a2 2 0 1 1 0-4a2 2 0 0 1 0 4z"/></svg>';
$acompteSVG = '<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22C6.477 22 2 17.523 2 12S6.477 2 12 2s10 4.477 10 10s-4.477 10-10 10zm0-2a8 8 0 1 0 0-16a8 8 0 0 0 0 16zm-1.95-9H15v2h-4.95a2.5 2.5 0 0 0 4.064 1.41l1.7 1.133A4.5 4.5 0 0 1 8.028 13H7v-2h1.027a4.5 4.5 0 0 1 7.788-2.543L14.114 9.59A2.5 2.5 0 0 0 10.05 11z"/></svg>';
$profilSVG = '<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M20 22h-2v-2a3 3 0 0 0-3-3H9a3 3 0 0 0-3 3v2H4v-2a5 5 0 0 1 5-5h6a5 5 0 0 1 5 5v2zm-8-9a6 6 0 1 1 0-12a6 6 0 0 1 0 12zm0-2a4 4 0 1 0 0-8a4 4 0 0 0 0 8z"/></svg>';
$adminSVG = '<svg width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12 14v2a6 6 0 0 0-6 6H4a8 8 0 0 1 8-8zm0-1c-3.315 0-6-2.685-6-6s2.685-6 6-6s6 2.685 6 6s-2.685 6-6 6zm0-2c2.21 0 4-1.79 4-4s-1.79-4-4-4s-4 1.79-4 4s1.79 4 4 4zm9 6h1v5h-8v-5h1v-1a3 3 0 0 1 6 0v1zm-2 0v-1a1 1 0 0 0-2 0v1h2z"/></svg>';
?>
<link rel="stylesheet" href="./src/css/styles.css">
<header>
    <div class="left">
        <a href="./controller/Auth/logout.php">
            <?= $logoutSGV ?>
            Déconnexion</a>
        <a href="./?page=produit">
            <?= $cartSVG ?>
            Produits</a>
        <a href="./?page=acompte"">
        <?= $acompteSVG ?>
        Acompte</a>
        <a href="./?page=profil"">
        <?= $profilSVG ?>
        Profil</a>
        <?php
        if ($_SESSION['type_account'] == 'Admin') {
            echo '<a href="./?page=admin">' . $adminSVG . 'Admin</a>';

        }
        ?>

    </div>
    <div class="right" style="flex-flow: column; align-items: flex-start">
        <?php foreach ($data as $key => $value) {
            if ($value['id'] == $_SESSION['id']) {
                echo '<a href="?page=profil" style="position: relative">';
                echo '<span class="cash">';
                echo $value['acompte'] . '€';
                echo '</span>';
                echo '<span class="user">';
                echo $value['prenom'] . ' ' . $value['nom'][0] . '.';
                echo '</span>';
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
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

<style>
    header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    header a {
        display: flex;
        align-items: center;
        gap: 5px;
        margin: 0 10px;
        color: #000;
        text-decoration: none;
        font-size: 16px;
    }

    header .left {
        display: flex;
        align-items: center;
    }

    header .right {
        display: flex;
        align-items: center;
    }

    header svg {
        vertical-align: middle;
    }

    /*header .user {
        position: absolute;
        top: 0;
        right: 0;
        background-color: #000;
        color: #fff;
        padding: 2px 5px;
        border-radius: 5px;
        font-size: 12px;
    }

    header .cash {
        position: absolute;
        top: 0;
        right: 0;
        background-color: #000;
        color: #fff;
        padding: 2px 5px;
        border-radius: 5px;
        font-size: 12px;
    }*/
</style>