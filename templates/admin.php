<?php
include_once "php/database.php";
include_once "view/header.php";
include_once "php/functions.php";

$sql = 'SELECT * FROM `users`';

$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll(PDO::FETCH_ASSOC);

// Bloquer l'accès à la page admin si l'utilisateur n'est pas admin
if ($_SESSION['type_account'] != 'Admin') {
    header('location: ./');
}
?>
<body>
<main>
    <h1>Administrateur</h1>
    <table>
        <thead>
        <tr>
            <td>Nom</td>
            <td>Prénom</td>
            <td>Acompte</td>
            <td colspan="2">Modif/Suppr.</td>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($data as $value) {
            echo '<tr>';
            echo '<td>' . $value['nom'] . '</td>';
            echo '<td>' . $value['prenom'] . '</td>';
            echo '<td>' . $value['acompte'] . '€</td>';
            echo "<td><a href='?page=admin&id={$value['id']}&acompte={$value['acompte']}&modif=True'>Modifier</a></td>";
            echo "<td><a href='?page=admin&id={$value['id']}&del=True' style='color: red'>Supprimer</a></td>";
            echo '</tr>';
        }
        ?>
        </tbody>
    </table>
    <div class="btn__group">
        <a href="?page=logs" class="btn">Voir les logs</a>
        <a href="?page=admin&add_account=True" class="btn">Ajouter un compte</a>
    </div>
    <?php
    // Ajout d'un compte
    if (isset($_GET['add_account']) == 'True') {
        include "templates/create.php";
    }

    // Suppression un compte
    if (isset($_GET['id']) && isset($_GET['del']) == 'True') {
        echo '<form action="" method="POST">';
        if ($_SESSION['id'] != $_GET['id']) {
            echo '<input type="submit" name="submit" value="Confirmation de la suppression">';
            if (isset($_POST['submit'])) {
                delById($_GET['id']);
                header('location: ?page=admin');
            }
        } else {
            echo '<p style="text-align: center">Vous ne pouvez pas supprimer votre propre compte</p>';
            echo "<a href='?page=admin' style='text-align: center'>Annulez</a>";
        }
    }

    // Modification d'acompte
    if (isset($_GET['id']) && isset($_GET['modif']) == 'True') {
        echo '<form action="" method="POST">';
        echo "<input type='text' name='acompte' placeholder='acompte'>";
        echo '<input type="submit" name="submit" value="Envoyer">';
        echo '<a href="?page=admin" class="cancel">Annuler</a>';
        echo "</form>";
        $id = $_GET['id'];

        if (isset($_POST['submit'])) {
            $acompte = $_GET['acompte'] + $_POST['acompte'];
            modifAcompte($acompte, $id);
            header('location: ?page=admin');
        }
    }
    ?>
</main>
</body>
</html>


<style>
    h1 {
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        margin: 20px auto;
    }

    thead {
        font-weight: bold;
    }

    table {
        margin: auto;
    }

    table,
    td {
        border: 1px solid #333;
    }

    thead,
    tfoot {
        background-color: #333;
        color: #fff;
    }

    tr > * {
        padding: 15px 30px;
    }

    td {
        width: 200px;
        max-width: 90%;
        text-align: center;
    }

    td a {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .btn__group {
        display: flex;
        flex-flow: wrap;
    }

    .btn {
        background: #333;
        color: #FFF;
        display: flex;
        justify-content: center;
        align-items: center;
        margin: 20px auto;
        width: 200px;
        padding: 15px 30px;
        text-decoration: none !important;
    }

    .btn:hover {
        background: #555;
        transition: .3s;
    }

    main a {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #ffffff;
        border-radius: 4px;
    }


    a:hover {
        background: #555;
        transition: .3s;
    }

    form {
        display: flex;
        max-width: 90%;
        width: 500px;
        margin: 5% auto;
        flex-direction: column;
        gap: 10px;
    }

    /* Create.php & ModifAcompte */
    form {
        display: flex;
        max-width: 90%;
        width: 500px;
        margin: 5% auto;
        flex-direction: column;
        gap: 10px;
    }

    form input, select, td > a {
        padding: 10px 30px;
        border: none;
        cursor: pointer;
        background: #333;
        color: #FFF;
        border-radius: 4px;
    }

    form input:hover, a:hover {
        background: #555;
        transition: .3s;
    }

    input {
        font-size: 16px;
        font-family: 'Poppins', sans-serif;
    }

    .cancel {
        text-align: center;
        color: #FFF;
    }
</style>
