<?php
// Connexion BDD
require_once 'php/database.php';

// Récupéreration tous les éléments
$sql = "SELECT * FROM `users`;";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll();
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
        <a href="#" style="position: relative">
            <span class="cash">
                <!--130,00€-->

            </span>
            <span class="user">
                <!--J. Doe-->
            </span>
            <!--<svg style="vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                 height="24">
                <path fill="none" d="M0 0h24v24H0z"/>
                <path d="M12 13.172l4.95-4.95 1.414 1.414L12 16 5.636 9.636 7.05 8.222z" fill=""/>
            </svg>-->
        </a>
    </div>
</header>