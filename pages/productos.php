<?php
require_once("./../lib/db.php");

session_start();

$db = new DB();
$pdo = $db->connect();

$sql = "SELECT * FROM producto;";

//Listar productos
$results = $db->query($sql);

?>

<table class="table table-responsive">
    <thead>
        <tr>
            <th>ID</th>
            <th>CATEGORIA</th>
            <th>MARCA</th>
            <th>TIPO PROD.</th>
            <th>PRODUCTOR</th>
            <th>FECHA EXP.</th>
            <th>STOCK</th>
            <th>PRECIO</th>
        </tr>
    </thead>

    <tbody>
<?php
    while($row = $results->fetch(PDO::FETCH_ASSOC)) {
?>
        <tr>
            <td><?= $row['id']; ?></td>
            <td><?= $row['id_categoria']; ?></td>
            <td><?= $row['marca']; ?></td>
            <td><?= $row['tipo_producto']; ?></td>
            <td><?= $row['id_productor']; ?></td>
            <td><?= $row['fecha_exp']; ?></td>
            <td><?= $row['stock']; ?></td>
            <td>$<?= number_format($row['precio'],0,',','.'); ?></td>
        </tr>      
<?php } ?>
    </tbody>

</table>