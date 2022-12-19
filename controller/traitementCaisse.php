<?php
// Connexion BDD
include "php/database.php";

// Récupération tous les éléments
$sql = "SELECT * FROM `stocks`";
$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll(PDO::FETCH_ASSOC);