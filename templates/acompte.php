<?php
include_once 'php/functions.php';
$sql = 'SELECT * FROM `users`';

$result = $db->prepare($sql);
$result->execute();

$data = $result->fetchAll(PDO::FETCH_ASSOC);
?>
<body>
<h1>Listes des acomptes</h1>
<table>
    <thead>
    <tr>
        <td>Compte</td>
        <td>Acompte</td>
        <td>Modif</td>
    <tr>
    </thead>
    <tbody>
    <?php
    foreach ($data as $key => $value) {
        echo '<tr>';
        // string upercase

        echo '<td>' . strtoupper($value['nom']) . ' ' . $value['prenom'] . '</td>';
        echo '<td>' . $value['acompte'] . '€</td>';
        echo "<td><a href='?page=acompte&id={$value['id']}&acompte={$value['acompte']}&modif=True'>Modifier</a></td>";
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
<?php
// Modification d'acompte
if (isset($_GET['id']) && isset($_GET['modif']) == 'True') {
    echo '<form action="" method="POST">';
    echo "<input type='text' name='acompte' placeholder='acompte'>";
    echo '<input type="submit" name="submit" value="Envoyer">';
    echo '<a href="?page=acompte" class="cancel">Annuler</a>';
    echo "</form>";
    $id = $_GET['id'];

    if (isset($_POST['submit'])) {
        $acompte = $_GET['acompte'] + $_POST['acompte'];
        modifAcompte($acompte, $id);
        echo "<script>window.location.href = '?page=acompte'</script>";

    }
}
?>
</body>

<style>
    h1 {
        text-align: center;
        font-size: 50px;
        font-weight: bold;
        margin: 50px auto;
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

    /* ModifAcompte */
    form {
        display: flex;
        max-width: 90%;
        width: 500px;
        margin: 30px auto;
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
