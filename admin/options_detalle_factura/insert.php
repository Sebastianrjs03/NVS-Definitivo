<?php 

require '../../config/database.php';

$db = new Database();
$con = $db->conectar();

$id = $_POST['idfactura'];
$idProducto = $_POST['idProducto'];
$cantidadProducto = $_POST['cantidadProducto'];
$valorUnitario = $_POST['valorUnitario'];
$iva = $_POST['iva'];
$total = $_POST['total'];

$consul = ("INSERT INTO detallefactura (fk_pk_Factura, fk_pk_Producto, cantidadProducto, valorUnitarioProducto, ivaProducto, totalProducto)
            VALUES (:id, :producto, :cantidad, :valorUnitario, :iva, :total)");

try {
    $sql = $con->prepare($consul);


    $sql->execute([
        ":id"=> $id,
        ':producto' => $id,
        ':cantidad' => $cantidadProducto,
        ':valorUnitario' => $valorUnitario,
        ':iva' => $iva,
        ':total' => $total
    ]);

    header('Location: ../detalles_factura/detalle_factura.php');
    exit; 

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>